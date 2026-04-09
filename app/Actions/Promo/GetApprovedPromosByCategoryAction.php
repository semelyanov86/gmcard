<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\PromoListItemData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Category;
use App\Models\Promo;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class GetApprovedPromosByCategoryAction
{
    use AsAction;

    /**
     * @return list<PromoListItemData>
     */
    public function handle(Category $category, array $filters = []): array
    {
        /** @var list<int> $categoryIds */
        $categoryIds = array_values(array_unique(array_merge(
            [$category->id],
            $category->descendants()->get()->pluck('id')->all(),
        )));

        if ($categoryIds === []) {
            return [];
        }

        $query = Promo::query()
            ->with(PromoListItemData::eagerLoadForListItem())
            ->where('moderation_status', PromoModerationStatus::APPROVED->value)
            ->whereHas('categories', fn ($q) => $q->whereIn('category_id', $categoryIds));

        if (!empty($filters['promo_type'])) {
            $query->where('promo_type_id', (int) $filters['promo_type']);
        }

        if (!empty($filters['city'])) {
            $query->whereHas('cities', fn ($q) => $q->where('cities.id', $filters['city']));
        }

        // Исправить
        if (!empty($filters['min_discount'])) {
            $query->whereRaw(
                "CAST(COALESCE(NULLIF(discount, ''), '0') AS UNSIGNED) >= ?",
                [$filters['min_discount']]
            );
        }

        $promos = $query->latest()->get();

        return array_values(PromoListItemData::collect($promos, 'array'));
    }
}
