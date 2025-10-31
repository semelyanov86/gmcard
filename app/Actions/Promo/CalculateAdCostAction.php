<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Actions\User\GetUserTariffLimitsAction;
use App\Data\PromoCostData;
use App\Enums\Promo\PromoCostType;
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

        if ($limits->firstAdFree) {
            return $this->buildFreeResult($durationDays, PromoCostType::FIRST_FREE);
        }

        if ($limits->hasFreeSlot) {
            return $this->buildFreeResult($durationDays, PromoCostType::WITHIN_LIMIT);
        }

        if (! $tariff) {
            return $this->buildFreeResult($durationDays, PromoCostType::NO_TARIFF);
        }

        /** @var int $dailyCost */
        $dailyCost = $isShowInBanner
            ? $tariff->getRawOriginal('banner_price')
            : $tariff->getRawOriginal('extra_ad_price');

        $totalCost = $dailyCost * $durationDays;

        return new PromoCostData(
            dailyCost: $dailyCost,
            isFree: false,
            type: $isShowInBanner ? PromoCostType::BANNER : PromoCostType::EXTRA,
            durationDays: $durationDays,
            totalCost: $totalCost,
        );
    }

    /**
     * @return PromoCostData
     */
    private function buildFreeResult(int $durationDays, PromoCostType $type): PromoCostData
    {
        return new PromoCostData(
            dailyCost: 0,
            isFree: true,
            type: $type,
            durationDays: $durationDays,
            totalCost: 0,
        );
    }
}
