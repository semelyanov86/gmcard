<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\PromoListItemData;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Support\Collection;
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
            'activePromos' => $this->mapPromos($user->activePromos()->get()),
            'completedPromos' => $this->mapPromos($user->completedPromos()->get()),
            'draftPromos' => $this->mapPromos($user->draftPromos()->get()),
            'moderationPromos' => $this->mapPromos($user->moderationPromos()->get()),
        ];
    }

    /**
     * @param  Collection<int, Promo>  $promos
     * @return array<int, PromoListItemData>
     */
    private function mapPromos(Collection $promos): array
    {
        return $promos->map(fn ($promo) => PromoListItemData::fromPromo($promo))->all();
    }
}
