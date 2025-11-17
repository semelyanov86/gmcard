<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\PromoType as PromoTypeEnum;
use App\Models\Address;
use App\Models\Promo;
use App\ValueObjects\MoneyValueObject;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
final class PromoFormData extends Data
{
    /**
     * @param  array<int, string>  $categoryIds
     * @param  array<int, int>  $cityIds
     * @param  array<int, array<string, mixed>>  $addresses
     * @param  array<string, mixed>  $schedule
     * @param  array<string, string>  $socialLinks
     * @param  array<string, float|string>|null  $discount
     * @param  array<string, float|string>|null  $cashback
     * @param  array<int, UploadedFile|string>  $photos
     */
    public function __construct(
        public int $id,
        public int $promoTypeId,
        public string $title,
        public string $description,
        public ?string $conditions,
        public ?array $discount,
        public ?array $cashback,
        public array $categoryIds,
        public array $cityIds,
        public array $addresses,
        public array $schedule,
        public array $socialLinks,
        public ?string $promoCode = null,
        public ?int $minimumOrderAmount = null,
        public bool $freeDelivery = false,
        public ?int $freeDeliveryFrom = null,
        public int $durationDays = 1,
        public bool $showInBanner = false,
        public ?string $youtubeUrl = null,
        public ?string $existingPhoto = null,
        public array $photos = [],
        public bool $useBonusBalance = false,
        public bool $isDraft = false,
        public bool $agreeToTerms = true,
        public string $filterCity = '',
    ) {}

    public static function fromPromo(Promo $promo): self
    {
        $promo->loadMissing(['categories:id', 'cities:id', 'addresses']);

        [$discount, $cashback] = self::splitDiscounts($promo);

        /** @var array<int|string, int> $categoryIdsRaw */
        $categoryIdsRaw = $promo->categories->pluck('id')->all();
        /** @var array<int|string, int> $cityIdsRaw */
        $cityIdsRaw = $promo->cities->pluck('id')->all();

        return new self(
            id: $promo->id,
            promoTypeId: $promo->promo_type_id ?? self::mapPromoTypeToId($promo->type),
            title: $promo->name,
            description: $promo->description ?? '',
            conditions: $promo->extra_conditions,
            discount: $discount,
            cashback: $cashback,
            categoryIds: array_values(array_map(fn (int $id): string => (string) $id, $categoryIdsRaw)),
            cityIds: array_values(array_map(fn (int $id): int => $id, $cityIdsRaw)),
            addresses: self::transformAddresses($promo->addresses),
            schedule: self::buildSchedule($promo),
            socialLinks: $promo->smm_links ?? [],
            promoCode: $promo->code,
            minimumOrderAmount: self::moneyToInt($promo->sales_order_from),
            freeDelivery: (bool) $promo->free_delivery,
            freeDeliveryFrom: self::moneyToInt($promo->free_delivery_from),
            durationDays: self::resolveDurationDays($promo),
            showInBanner: (bool) $promo->show_on_home,
            youtubeUrl: $promo->video_link,
            existingPhoto: $promo->img,
            photos: [],
            useBonusBalance: false,
            isDraft: $promo->started_at === null,
            agreeToTerms: true,
            filterCity: '',
        );
    }

    /**
     * @return array{0: array<string, float|string>|null, 1: array<string, float|string>|null} [discount, cashback]
     */
    private static function splitDiscounts(Promo $promo): array
    {
        $discountValue = self::parseDiscountValue($promo->discount);
        $isCashbackType = in_array($promo->type, [PromoTypeEnum::CASHBACK, PromoTypeEnum::KONKURS], true);

        return [
            $isCashbackType ? null : $discountValue,
            $isCashbackType ? $discountValue : null,
        ];
    }

    /**
     * @return array<string, float|string>|null
     */
    private static function parseDiscountValue(?string $value): ?array
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
    private static function buildSchedule(Promo $promo): array
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
    private static function transformAddresses(Collection $addresses): array
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

    private static function moneyToInt(?MoneyValueObject $money): ?int
    {
        if (! $money) {
            return null;
        }

        return (int) round($money->toFloat());
    }

    private static function resolveDurationDays(Promo $promo): int
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

    private static function mapPromoTypeToId(?PromoTypeEnum $type): int
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
