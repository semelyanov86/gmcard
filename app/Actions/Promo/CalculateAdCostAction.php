<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Actions\User\GetUserTariffLimitsAction;
use App\Data\PromoCostData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static PromoCostData run(User $user, int $durationDays, bool $isShowInBanner = false)
 */
final readonly class CalculateAdCostAction
{
    use AsAction;

    /**
     * @return PromoCostData
     */
    public function handle(User $user, int $durationDays, bool $isShowInBanner = false): PromoCostData
    {
        $limits = GetUserTariffLimitsAction::run($user);
        $tariff = $user->tariffPlan;

        if ($limits->isNextAdFirstFree) {
            return $this->buildFreeResult($durationDays, 'first_ad_always_free');
        }

        if ($limits->canCreateFreeAd) {
            return $this->buildFreeResult($durationDays, 'within_tariff_limit');
        }

        if (! $tariff) {
            return $this->buildFreeResult($durationDays, 'no_tariff');
        }

        /** @var int $dailyCost */
        $dailyCost = $isShowInBanner
            ? $tariff->getRawOriginal('banner_price')
            : $tariff->getRawOriginal('extra_ad_price');

        $totalCost = $dailyCost * $durationDays;

        return new PromoCostData(
            dailyCost: $dailyCost,
            isFree: false,
            reason: $isShowInBanner ? 'banner_placement' : 'extra_ad',
            durationDays: $durationDays,
            totalCost: $totalCost,
        );
    }

    /**
     * @return PromoCostData
     */
    private function buildFreeResult(int $durationDays, string $reason): PromoCostData
    {
        return new PromoCostData(
            dailyCost: 0,
            isFree: true,
            reason: $reason,
            durationDays: $durationDays,
            totalCost: 0,
        );
    }
}
