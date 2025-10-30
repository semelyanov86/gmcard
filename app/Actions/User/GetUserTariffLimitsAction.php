<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use App\Models\TariffPlan;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static array run(User $user)
 */
final readonly class GetUserTariffLimitsAction
{
    use AsAction;

    public function handle(User $user): array
    {
        $activePromosCount = $this->getActivePromosCount($user);
        $tariff = $user->tariffPlan;

        return [
            'active_promos_count' => $activePromosCount,
            'can_create_free_ad' => $this->canCreateFreeAd($user, $activePromosCount, $tariff),
            'is_next_ad_first_free' => $activePromosCount === 0,
            'tariff_ads_limit' => $tariff?->ads_count ?? 0,
        ];
    }

    private function getActivePromosCount(User $user): int
    {
        return $user->activePromos()->count();
    }

    private function canCreateFreeAd(User $user, int $activePromosCount, ?TariffPlan $tariff): bool
    {
        if (! $tariff) {
            return false;
        }

        return $activePromosCount < $tariff->ads_count;
    }
}
