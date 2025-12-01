<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\PromoListItemData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static array<string, array<int, PromoListItemData>> run(User $user)
 */
final readonly class GetUserPromosAction
{
    use AsAction;

    /**
     * @return array<string, array<int, PromoListItemData>>
     */
    public function handle(User $user): array
    {
        return [
            'activePromos' => PromoListItemData::collect($user->activePromos()->get(), 'array'),
            'completedPromos' => PromoListItemData::collect($user->completedPromos()->get(), 'array'),
            'draftPromos' => PromoListItemData::collect($user->draftPromos()->get(), 'array'),
            'moderationPromos' => PromoListItemData::collect($user->moderationPromos()->get(), 'array'),
            'rejectedPromos' => PromoListItemData::collect($user->rejectedPromos()->get(), 'array'),
        ];
    }
}
