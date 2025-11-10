<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\PromoTypeData;
use App\Enums\PromoTypeSizeEnum;
use App\Models\PromoType;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static PromoTypeData[] run()
 */
final readonly class GetPromoTypesAction
{
    use AsAction;

    /**
     * @return PromoTypeData[]
     */
    public function handle(): array
    {
        return PromoType::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn (PromoType $type) => new PromoTypeData(
                id: $type->id,
                title: $type->name,
                description: $type->description ?? '',
                size: $type->id <= 3 ? PromoTypeSizeEnum::LARGE : PromoTypeSizeEnum::SMALL
            ))
            ->toArray();
    }
}
