<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\PromoListItemData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static PromoListItemData[] run(array{city?: int|null, min_discount?: int|null, promo_type?: int|null, search?: string|null} $filters = [])
 */
final readonly class GetApprovedPromosForHomeAction
{
    use AsAction;

    /**
     * @param  array{city?: int|null, min_discount?: int|null, promo_type?: int|null, search?: string|null}  $filters
     * @return PromoListItemData[]
     */
    public function handle(array $filters = []): array
    {
        $query = Promo::query()
            ->with(PromoListItemData::eagerLoadForListItem())
            ->where('moderation_status', PromoModerationStatus::APPROVED->value)
            ->where('show_on_home', true);

        if (! empty($filters['promo_type'])) {
            $query->where('promo_type_id', (int) $filters['promo_type']);
        }

        if (! empty($filters['city'])) {
            $query->whereHas('cities', fn ($q) => $q->where('cities.id', $filters['city']));
        }

        if (! empty($filters['search'])) {
            $term = addcslashes($filters['search'], '%_\\');
            $query->where('name', 'like', '%' . $term . '%');
        }

        if (! empty($filters['min_discount'])) {
            $query
                ->where('discount_currency', 'PCT')
                ->where('discount_amount', '>=', (float) $filters['min_discount']);
        }

        $promos = $query->latest()->take(24)->get();

        return PromoListItemData::collect($promos, 'array');
    }
}
