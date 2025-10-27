<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\CreatePromoData;
use App\Enums\PromoType;
use App\Models\Address;
use App\Models\Promo;
use App\ValueObjects\MoneyValueObject;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

/**
 * @method static Promo run(CreatePromoData $dto)
 */
final readonly class CreatePromoAction
{
    use AsAction;

    /**
     * @throws Throwable
     */
    public function handle(CreatePromoData $dto): Promo
    {
        Log::info('🏭 CreatePromoAction: Начало обработки', [
            'dto_user_id' => $dto->userId,
            'promo_type_id' => $dto->promoTypeId,
            'title' => $dto->title,
            'is_draft' => $dto->isDraft,
        ]);

        return DB::transaction(function () use ($dto): Promo {
            $promoType = $this->getPromoType($dto->promoTypeId);
            $discount = $this->getDiscount($dto, $promoType);

            Log::info('💰 Промо данные подготовлены', [
                'promo_type' => $promoType->value,
                'discount' => $discount,
                'minimum_order_amount' => $dto->minimumOrderAmount,
                'duration_days' => $dto->durationDays,
            ]);

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
                'amount' => $dto->discountAmount
                    ? MoneyValueObject::fromString((string) $dto->discountAmount)
                    : null,
                'sales_order_from' => $dto->minimumOrderAmount
                    ? MoneyValueObject::fromString((string) $dto->minimumOrderAmount)
                    : MoneyValueObject::fromCents(0),
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
                'free_delivery_from' => $dto->freeDeliveryFrom
                    ? MoneyValueObject::fromString((string) $dto->freeDeliveryFrom)
                    : MoneyValueObject::fromCents(0),
            ];

            Log::info('📝 Создание промо в базе данных', [
                'create_data' => array_merge($createData, [
                    'amount' => $createData['amount'] ? [
                        'amount' => $createData['amount']->getMoney()->getAmount(),
                        'currency' => $createData['amount']->getCurrency(),
                    ] : null,
                    'sales_order_from' => $createData['sales_order_from'] ? [
                        'amount' => $createData['sales_order_from']->getMoney()->getAmount(),
                        'currency' => $createData['sales_order_from']->getCurrency(),
                    ] : null,
                    'free_delivery_from' => $createData['free_delivery_from'] ? [
                        'amount' => $createData['free_delivery_from']->getMoney()->getAmount(),
                        'currency' => $createData['free_delivery_from']->getCurrency(),
                    ] : null,
                ]),
            ]);

            $promo = Promo::create($createData);

            Log::info('🔗 Синхронизация связей промо', [
                'promo_id' => $promo->id,
                'categories_count' => count($dto->categoryIds),
                'cities_count' => count($dto->cityIds),
                'addresses_count' => $dto->addresses ? count($dto->addresses) : 0,
            ]);

            $this->syncRelations($promo, $dto);

            Log::info('🎉 Промо создан и готов', [
                'promo_id' => $promo->id,
                'promo_name' => $promo->name,
                'promo_code' => $promo->code,
                'available_till' => $promo->available_till?->format('Y-m-d H:i:s'),
                'started_at' => $promo->started_at?->format('Y-m-d H:i:s'),
            ]);

            return $promo;
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
        Log::info('🔄 Синхронизация категорий и городов', [
            'promo_id' => $promo->id,
            'category_ids' => $dto->categoryIds,
            'city_ids' => $dto->cityIds,
        ]);

        $promo->categories()->sync($dto->categoryIds);
        $promo->cities()->sync($dto->cityIds);

        if ($dto->addresses && ! empty($dto->addresses)) {
            $addressIds = [];
            Log::info('📍 Обработка адресов для промо', [
                'promo_id' => $promo->id,
                'addresses_data' => $dto->addresses,
            ]);

            foreach ($dto->addresses as $index => $addressData) {
                if (empty($addressData['address']) && empty($addressData['phone'])) {
                    Log::info('⏭️ Пропускаем пустой адрес', ['index' => $index]);

                    continue;
                }

                $addressCreateData = [
                    'name' => $addressData['address'] ?? '',
                    'open_hours' => ! empty($addressData['schedule']) ? ['schedule' => $addressData['schedule']] : null,
                    'phone' => $addressData['phone'] ?? '',
                    'phone_secondary' => $addressData['phone2'] ?? null,
                ];

                Log::info('🏪 Создание нового адреса', [
                    'promo_id' => $promo->id,
                    'address_index' => $index,
                    'address_data' => $addressCreateData,
                ]);

                $address = Address::create($addressCreateData);

                Log::info('✅ Адрес создан', [
                    'promo_id' => $promo->id,
                    'address_id' => $address->id,
                    'address_name' => $address->name,
                ]);

                $addressIds[] = $address->id;
            }

            if (! empty($addressIds)) {
                Log::info('🔗 Привязка адресов к промо', [
                    'promo_id' => $promo->id,
                    'address_ids' => $addressIds,
                ]);
                $promo->addresses()->sync($addressIds);
            }
        }
    }

    private function getDiscount(CreatePromoData $dto, PromoType $type): ?string
    {
        if (in_array($type, [PromoType::SIMPLE, PromoType::COUPON, PromoType::GIFT]) && $dto->discountAmount) {
            return $dto->discountAmount . ($dto->discountCurrency ?? '%');
        }

        if (in_array($type, [PromoType::CASHBACK, PromoType::KONKURS]) && $dto->cashbackAmount) {
            return $dto->cashbackAmount . ($dto->cashbackCurrency ?? '%');
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
