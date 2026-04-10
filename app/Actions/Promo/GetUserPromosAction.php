<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\PromoListItemData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static array<string, PromoListItemData[]> run(User $user)
 */
final readonly class GetUserPromosAction
{
    use AsAction;

    /**
     * @return array<string, PromoListItemData[]>
     */
    public function handle(User $user): array
    {
        $listItemRelations = PromoListItemData::eagerLoadForListItem();

        return [
            'activePromos' => PromoListItemData::collect($user->activePromos()->with($listItemRelations)->get(), 'array'),
            'completedPromos' => PromoListItemData::collect($user->completedPromos()->with($listItemRelations)->get(), 'array'),
            'draftPromos' => PromoListItemData::collect($user->draftPromos()->with($listItemRelations)->get(), 'array'),
            'moderationPromos' => PromoListItemData::collect($user->moderationPromos()->with($listItemRelations)->get(), 'array'),
            'rejectedPromos' => PromoListItemData::collect($user->rejectedPromos()->with($listItemRelations)->get(), 'array'),
        ];
    }
}
