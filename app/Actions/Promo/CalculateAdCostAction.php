<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Actions\User\GetUserTariffLimitsAction;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static array run(User $user, int $durationDays, bool $isShowInBanner = false)
 */
final readonly class CalculateAdCostAction
{
    use AsAction;

    public function handle(User $user, int $durationDays, bool $isShowInBanner = false): array
    {
        $limits = GetUserTariffLimitsAction::run($user);
        $tariff = $user->tariffPlan;

        if ($limits['is_next_ad_first_free']) {
            return $this->buildFreeResult($durationDays, 'first_ad_always_free');
        }

        if ($limits['can_create_free_ad']) {
            return $this->buildFreeResult($durationDays, 'within_tariff_limit');
        }

        if (! $tariff) {
            return $this->buildFreeResult($durationDays, 'no_tariff');
        }

        $dailyCost = $isShowInBanner
            ? $tariff->getRawOriginal('banner_price')
            : $tariff->getRawOriginal('extra_ad_price');

        $totalCost = $dailyCost * $durationDays;

        return [
            'daily_cost' => $dailyCost,
            'is_free' => false,
            'reason' => $isShowInBanner ? 'banner_placement' : 'extra_ad',
            'duration_days' => $durationDays,
            'total_cost' => $totalCost,
        ];
    }

    private function buildFreeResult(int $durationDays, string $reason): array
    {
        return [
            'daily_cost' => 0,
            'is_free' => true,
            'reason' => $reason,
            'duration_days' => $durationDays,
            'total_cost' => 0,
        ];
    }
}
