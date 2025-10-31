<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use App\Models\TariffPlan;
use App\Data\UserTariffLimitsData;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static UserTariffLimitsData run(User $user)
 */
final readonly class GetUserTariffLimitsAction
{
    use AsAction;

    /**
     * @return UserTariffLimitsData
     */
    public function handle(User $user): UserTariffLimitsData
    {
        $activePromosCount = $this->getActivePromosCount($user);
        $tariff = $user->tariffPlan;

        return new UserTariffLimitsData(
            activePromosCount: $activePromosCount,
            canCreateFreeAd: $this->canCreateFreeAd($user, $activePromosCount, $tariff),
            isNextAdFirstFree: $activePromosCount === 0,
            tariffAdsLimit: $tariff->ads_count ?? 0,
        );
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
