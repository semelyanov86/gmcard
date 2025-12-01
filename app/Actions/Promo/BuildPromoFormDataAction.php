<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\PromoFormData;
use App\Enums\Promo\PromoModerationStatus;
use App\Enums\PromoType as PromoTypeEnum;
use App\Models\Address;
use App\Models\Promo;
use App\ValueObjects\MoneyValueObject;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static PromoFormData run(Promo $promo)
 */
final readonly class BuildPromoFormDataAction
{
    use AsAction;

    public function handle(Promo $promo): PromoFormData
    {
        $promo->loadMissing(['categories:id', 'cities:id', 'addresses']);

        [$discount, $cashback] = $this->splitDiscounts($promo);

        /** @var array<int|string, int> $categoryIdsRaw */
        $categoryIdsRaw = $promo->categories->pluck('id')->all();
        /** @var array<int|string, int> $cityIdsRaw */
        $cityIdsRaw = $promo->cities->pluck('id')->all();

        return new PromoFormData(
            id: $promo->id,
            promoTypeId: $promo->promo_type_id ?? $this->mapPromoTypeToId($promo->type),
            title: $promo->name,
            description: $promo->description ?? '',
            conditions: $promo->extra_conditions,
            discount: $discount,
            cashback: $cashback,
            categoryIds: array_values(array_map(fn (int $id): string => (string) $id, $categoryIdsRaw)),
            cityIds: array_values(array_map(fn (int $id): int => $id, $cityIdsRaw)),
            addresses: $this->transformAddresses($promo->addresses),
            schedule: $this->buildSchedule($promo),
            socialLinks: $promo->smm_links ?? [],
            promoCode: $promo->code,
            minimumOrderAmount: $this->moneyToInt($promo->sales_order_from),
            freeDelivery: (bool) $promo->free_delivery,
            freeDeliveryFrom: $this->moneyToInt($promo->free_delivery_from),
            durationDays: $this->resolveDurationDays($promo),
            showInBanner: (bool) $promo->show_on_home,
            youtubeUrl: $promo->video_link,
            existingPhoto: $promo->img,
            photos: [],
            useBonusBalance: false,
            isDraft: $promo->moderation_status === PromoModerationStatus::DRAFT,
            agreeToTerms: true,
            filterCity: '',
        );
    }

    /**
     * @return array{0: array<string, float|string>|null, 1: array<string, float|string>|null} [discount, cashback]
     */
    private function splitDiscounts(Promo $promo): array
    {
        $discountValue = $this->parseDiscountValue($promo->discount);
        $isCashbackType = in_array($promo->type, [PromoTypeEnum::CASHBACK, PromoTypeEnum::KONKURS], true);

        return [
            $isCashbackType ? null : $discountValue,
            $isCashbackType ? $discountValue : null,
        ];
    }

    /**
     * @return array<string, float|string>|null
     */
    private function parseDiscountValue(?string $value): ?array
    {
        if (! $value) {
            return null;
        }

        if (preg_match('/([\d.,]+)\s*(%|₽)?/u', $value, $matches)) {
            $amount = (float) str_replace(',', '.', $matches[1]);
            $currency = $matches[2] ?? '%';

            return [
                'amount' => $amount,
                'currency' => $currency,
            ];
        }

        return null;
    }

    /**
     * @return array<string, mixed>
     */
    private function buildSchedule(Promo $promo): array
    {
        $hasTimeRange = $promo->availabe_from !== null && $promo->available_to !== null;

        return [
            'enabled' => ! empty($promo->days_availability) || $hasTimeRange,
            'days' => $promo->days_availability ?? [],
            'timeRange' => [
                'enabled' => $hasTimeRange,
                'start' => $promo->availabe_from?->format('H:i') ?? '00:00',
                'end' => $promo->available_to?->format('H:i') ?? '23:59',
            ],
        ];
    }

    /**
     * @param  Collection<int, Address>  $addresses
     * @return array<int, array<string, mixed>>
     */
    private function transformAddresses(Collection $addresses): array
    {
        return $addresses->map(
            fn (Address $address) => [
                'address' => $address->name,
                'schedule' => data_get($address->open_hours, 'schedule'),
                'phone' => $address->phone ? (string) $address->phone : '',
                'phone2' => $address->phone_secondary ? (string) $address->phone_secondary : null,
            ]
        )->values()->all();
    }

    private function moneyToInt(?MoneyValueObject $money): ?int
    {
        if (! $money) {
            return null;
        }

        return (int) round($money->toFloat());
    }

    private function resolveDurationDays(Promo $promo): int
    {
        if ($promo->started_at !== null && $promo->available_till !== null) {
            $days = $promo->started_at->diffInDays($promo->available_till);

            return (int) max(1, (int) $days);
        }

        if ($promo->available_till !== null && $promo->created_at !== null) {
            $days = $promo->created_at->diffInDays($promo->available_till);

            return (int) max(1, (int) $days);
        }

        return 1;
    }

    private function mapPromoTypeToId(?PromoTypeEnum $type): int
    {
        return match ($type) {
            PromoTypeEnum::SIMPLE => 1,
            PromoTypeEnum::COUPON => 2,
            PromoTypeEnum::GIFT => 3,
            PromoTypeEnum::ONE_PLUS_ONE => 4,
            PromoTypeEnum::TWO_PLUS_ONE => 5,
            PromoTypeEnum::CASHBACK => 6,
            PromoTypeEnum::KONKURS => 7,
            default => 1,
        };
    }
}
