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
    public function handle(Category $category): array
    {
        $categoryIds = Category::descendantsAndSelf($category->id)->pluck('id')->all();

        if ($categoryIds === []) {
            return [];
        }

        $promos = Promo::query()
            ->with(PromoListItemData::eagerLoadForListItem())
            ->where('moderation_status', PromoModerationStatus::APPROVED->value)
            ->whereHas('categories', fn ($q) => $q->whereIn('category_id', $categoryIds))
            ->latest()
            ->get();

        return array_values(PromoListItemData::collect($promos, 'array'));
    }
}
