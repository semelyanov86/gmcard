<?php

declare(strict_types=1);

namespace App\Data;

use App\Models\Address;
use App\Models\Promo;
use App\Models\PromoType;
use Spatie\LaravelData\Data;

final class PromoShowData extends Data
{
    /**
     * @param array<int, array{
     *     id: int,
     *     name: string,
     *     openHours: ?array<string, string>,
     *     phone: ?string,
     *     phoneSecondary: ?string,
     *     website: ?string
     * }> $addresses
     */
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public ?string $availableTill,
        public ?string $img,
        public ?string $promoTypeIcon,
        public ?string $extraConditions,
        public ?int $salesOrderFrom,
        public ?bool $hasFreeDeliveryBadge,
        public ?array $socialLinks,
        public array $addresses,
    ) {}

    public static function fromPromo(Promo $promo): self
    {
        $resolvedPromoType = $promo->promoType ?? PromoType::where('name', $promo->type->value)->first();
        $salesOrderFrom = $promo->sales_order_from;

        return new self(
            id: $promo->id,
            name: $promo->name,
            description: $promo->description,
            availableTill: $promo->available_till?->toIso8601String(),
            img: $promo->img,
            promoTypeIcon: $resolvedPromoType?->icon,
            extraConditions: $promo->extra_conditions,
            salesOrderFrom: $salesOrderFrom !== null ? (int) round($salesOrderFrom->toFloat()) : null,
            hasFreeDeliveryBadge: (bool) $promo->free_delivery,
            socialLinks: $promo->smm_links,
            addresses: $promo->addresses->map(self::mapAddress(...))->values()->all(),
        );
    }

    /**
     * @return array{
     *     id: int,
     *     name: string,
     *     openHours: ?array<string, string>,
     *     phone: ?string,
     *     phoneSecondary: ?string,
     *     website: ?string
     * }
     */
    private static function mapAddress(Address $address): array
    {
        return [
            'id' => $address->id,
            'name' => $address->name,
            'openHours' => $address->open_hours,
            'phone' => $address->phone ? (string) $address->phone : null,
            'phoneSecondary' => $address->phone_secondary ? (string) $address->phone_secondary : null,
            'website' => $address->website,
        ];
    }
}
