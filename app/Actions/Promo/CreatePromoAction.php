<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Actions\Payment\CreatePaymentAction;
use App\Actions\User\RecalculateUserBalanceAction;
use App\Data\CreatePromoData;
use App\Data\PromoCostData;
use App\Data\PaymentData;
use App\Enums\PromoType;
 
use App\Models\Address;
use App\Models\Promo;
use App\Models\User;
use App\ValueObjects\MoneyValueObject;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

/**
 * @method static CreatePromoData run(CreatePromoData $dto)
 */
final readonly class CreatePromoAction
{
    use AsAction;

    /**
     * @throws Throwable
     */
    public function handle(CreatePromoData $dto): CreatePromoData
    {
        return DB::transaction(function () use ($dto): CreatePromoData {
            $user = User::findOrFail($dto->userId);

            /** @var PromoCostData $cost */
            $cost = CalculateAdCostAction::run($user, $dto->durationDays, $dto->showInBanner ?? false);

            if (! $cost->isFree) {
                $totalCost = $cost->totalCost;

                if ($dto->useBonusBalance) {
                    $user->refresh();
                    $bonusAttr = $user->getAttribute('bonus_balance');
                    $availableBonusRub = 0;
                    if (is_int($bonusAttr)) {
                        $availableBonusRub = $bonusAttr;
                    } elseif (is_string($bonusAttr) && is_numeric($bonusAttr)) {
                        $availableBonusRub = (int) $bonusAttr;
                    }

                    $neededRub = (int) ceil($totalCost / 100);
                    $debitRub = min($availableBonusRub, $neededRub);

                    if ($debitRub > 0) {
                        $user->forceFill(['bonus_balance' => $availableBonusRub - $debitRub])->save();
                        $totalCost -= $debitRub * 100;
                    }
                }

                if ($totalCost > 0) {
                    $actualBalance = RecalculateUserBalanceAction::run($user->id);
                    if ($actualBalance < $totalCost) {
                        $required = MoneyValueObject::fromCents($totalCost);
                        $available = MoneyValueObject::fromCents($actualBalance);
                        throw ValidationException::withMessages([
                            'balance' => "Недостаточно средств. Требуется: {$required->toDisplayValue()}, доступно: {$available->toDisplayValue()}",
                        ]);
                    }

                    CreatePaymentAction::run(PaymentData::forPromoPlacement(
                        $dto->userId,
                        MoneyValueObject::fromCents($totalCost),
                        $dto->durationDays,
                        $dto->title,
                    ));
                }
            }

            $promoType = $this->getPromoType($dto->promoTypeId);
            $discount = $this->getDiscount($dto, $promoType);

            $amount = $this->getAmount($dto, $promoType);

            $createData = [
                'user_id' => $dto->userId,
                'name' => $dto->title,
                'type' => $promoType,
                'description' => $dto->description,
                'extra_conditions' => $dto->conditions,
                'free_delivery' => $dto->freeDelivery ?? false,
                'show_on_home' => $dto->showInBanner ?? false,
                'available_till' => Carbon::now()->addDays($dto->durationDays),
                'discount' => $discount,
                'amount' => $amount,
                'sales_order_from' => $dto->minimumOrder ?? MoneyValueObject::fromCents(0),
                'code' => $dto->promoCode,
                'video_link' => $dto->youtubeUrl,
                'smm_links' => $dto->socialLinks,
                'days_availability' => is_array($dto->schedule) ? ($dto->schedule['days'] ?? null) : null,
                'availabe_from' => $this->getScheduleTime($dto->schedule, 'start'),
                'available_to' => $this->getScheduleTime($dto->schedule, 'end'),
                'img' => is_array($dto->photos) ? ($dto->photos[0] ?? null) : null,
                'started_at' => $dto->isDraft ? null : now(),
                'raise_on_top_hours' => 0,
                'restart_after_finish_days' => 0,
                'free_delivery_from' => $dto->freeDeliveryFrom ?? MoneyValueObject::fromCents(0),
                'daily_cost' => MoneyValueObject::fromCents($cost->dailyCost),
                'payment_required' => ! $cost->isFree,
            ];

            $promo = Promo::create($createData);

            $this->syncRelations($promo, $dto);

            $dto->id = $promo->id;

            return $dto;
        });
    }

    private function getPromoType(int $id): PromoType
    {
        return match ($id) {
            1 => PromoType::SIMPLE,
            2 => PromoType::COUPON,
            3 => PromoType::GIFT,
            4 => PromoType::ONE_PLUS_ONE,
            5 => PromoType::TWO_PLUS_ONE,
            6 => PromoType::CASHBACK,
            7 => PromoType::KONKURS,
            default => PromoType::SIMPLE,
        };
    }

    private function syncRelations(Promo $promo, CreatePromoData $dto): void
    {
        $promo->categories()->sync($dto->categoryIds);
        $promo->cities()->sync($dto->cityIds);

        if ($dto->addresses && ! empty($dto->addresses)) {
            $addressIds = [];

            foreach ($dto->addresses as $index => $addressData) {
                if (empty($addressData['address']) && empty($addressData['phone'])) {
                    continue;
                }

                $addressCreateData = [
                    'name' => $addressData['address'] ?? '',
                    'open_hours' => ! empty($addressData['schedule']) ? ['schedule' => $addressData['schedule']] : null,
                    'phone' => $addressData['phone'] ?? '',
                    'phone_secondary' => $addressData['phone2'] ?? null,
                ];

                $address = Address::create($addressCreateData);

                $addressIds[] = $address->id;
            }

            if (! empty($addressIds)) {
                $promo->addresses()->sync($addressIds);
            }
        }
    }

    private function getDiscount(CreatePromoData $dto, PromoType $type): ?string
    {
        if (in_array($type, [PromoType::SIMPLE, PromoType::COUPON, PromoType::GIFT]) && $dto->discount) {
            return $dto->discount->toString() . ($dto->discount->getCurrency() === 'RUB' ? '₽' : '%');
        }

        if (in_array($type, [PromoType::CASHBACK, PromoType::KONKURS]) && $dto->cashback) {
            return $dto->cashback->toString() . ($dto->cashback->getCurrency() === 'RUB' ? '₽' : '%');
        }

        return null;
    }

    private function getAmount(CreatePromoData $dto, PromoType $type): ?MoneyValueObject
    {
        if (in_array($type, [PromoType::SIMPLE, PromoType::COUPON, PromoType::GIFT]) && $dto->discount) {
            return $dto->discount->getCurrency() === 'RUB' ? $dto->discount : null;
        }

        if (in_array($type, [PromoType::CASHBACK, PromoType::KONKURS]) && $dto->cashback) {
            return $dto->cashback->getCurrency() === 'RUB' ? $dto->cashback : null;
        }

        return null;
    }

    /**
     * @param  array<string, mixed>|null  $schedule
     */
    private function getScheduleTime(?array $schedule, string $key): ?string
    {
        if (! is_array($schedule)) {
            return null;
        }

        $timeRange = $schedule['timeRange'] ?? null;
        if (! is_array($timeRange)) {
            return null;
        }

        $value = $timeRange[$key] ?? null;

        return is_string($value) ? $value : null;
    }
}
