<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Actions\Promo\CalculateAdCostAction;
use App\Actions\User\GetUserTariffLimitsAction;
use App\Enums\Promo\PromoCostType;
use App\Models\Promo;
use App\Models\TariffPlan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TariffPlanLimitsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_without_tariff_has_no_limits(): void
    {
        $user = $this->createUserWithTariff();

        $limits = GetUserTariffLimitsAction::run($user);

        $this->assertSame(0, $limits->activePromos);
        $this->assertFalse($limits->hasFreeSlot);
        $this->assertTrue($limits->firstAdFree);
        $this->assertSame(0, $limits->adsLimit);
    }

    public function test_user_with_tariff_gets_correct_limits(): void
    {
        $tariff = $this->createTariffPlan([
            'ads_count' => 5,
            'price' => 10000,
            'banner_price' => 5000,
            'extra_ad_price' => 1000,
        ]);

        $user = $this->createUserWithTariff($tariff);

        $limits = GetUserTariffLimitsAction::run($user);

        $this->assertSame(0, $limits->activePromos);
        $this->assertTrue($limits->hasFreeSlot);
        $this->assertTrue($limits->firstAdFree);
        $this->assertSame(5, $limits->adsLimit);
    }

    public function test_user_with_active_promos_has_reduced_free_slots(): void
    {
        $tariff = $this->createTariffPlan(['ads_count' => 3]);
        $user = $this->createUserWithTariff($tariff);
        $this->createActivePromos($user, 2);

        $limits = GetUserTariffLimitsAction::run($user);

        $this->assertSame(2, $limits->activePromos);
        $this->assertTrue($limits->hasFreeSlot);
        $this->assertFalse($limits->firstAdFree);
    }

    public function test_user_exceeding_tariff_limits_has_no_free_slots(): void
    {
        $tariff = $this->createTariffPlan(['ads_count' => 2]);
        $user = $this->createUserWithTariff($tariff);
        $this->createActivePromos($user, 2);

        $limits = GetUserTariffLimitsAction::run($user);

        $this->assertSame(2, $limits->activePromos);
        $this->assertFalse($limits->hasFreeSlot);
        $this->assertFalse($limits->firstAdFree);
    }

    public function test_first_ad_is_always_free(): void
    {
        $tariff = $this->createTariffPlan([
            'ads_count' => 3,
            'extra_ad_price' => 5000,
        ]);
        $user = $this->createUserWithTariff($tariff);

        $cost = CalculateAdCostAction::run($user, 7);

        $this->assertTrue($cost->isFree);
        $this->assertSame(PromoCostType::FIRST_FREE, $cost->type);
        $this->assertSame(0, $cost->totalCost);
        $this->assertSame(0, $cost->dailyCost);
    }

    public function test_ad_within_tariff_limit_is_free(): void
    {
        $tariff = $this->createTariffPlan([
            'ads_count' => 5,
            'extra_ad_price' => 5000,
        ]);
        $user = $this->createUserWithTariff($tariff);
        $this->createActivePromos($user, 2);

        $cost = CalculateAdCostAction::run($user, 10);

        $this->assertTrue($cost->isFree);
        $this->assertSame(PromoCostType::WITHIN_LIMIT, $cost->type);
        $this->assertSame(0, $cost->totalCost);
        $this->assertSame(10, $cost->durationDays);
    }

    public function test_ad_exceeding_tariff_limit_is_paid(): void
    {
        $tariff = $this->createTariffPlan([
            'ads_count' => 2,
            'extra_ad_price' => 1000,
        ]);
        $user = $this->createUserWithTariff($tariff);
        $this->createActivePromos($user, 2);

        $cost = CalculateAdCostAction::run($user, 7);

        $this->assertFalse($cost->isFree);
        $this->assertSame(PromoCostType::EXTRA, $cost->type);
        $this->assertSame(1000, $cost->dailyCost);
        $this->assertSame(7000, $cost->totalCost);
        $this->assertSame(7, $cost->durationDays);
    }

    public function test_banner_ad_uses_banner_price(): void
    {
        $tariff = $this->createTariffPlan([
            'ads_count' => 1,
            'banner_price' => 3000,
            'extra_ad_price' => 1000,
        ]);
        $user = $this->createUserWithTariff($tariff);
        $this->createActivePromos($user, 1);

        $cost = CalculateAdCostAction::run($user, 5, true);

        $this->assertFalse($cost->isFree);
        $this->assertSame(PromoCostType::BANNER, $cost->type);
        $this->assertSame(3000, $cost->dailyCost);
        $this->assertSame(15000, $cost->totalCost);
    }

    public function test_regular_ad_uses_extra_ad_price(): void
    {
        $tariff = $this->createTariffPlan([
            'ads_count' => 1,
            'banner_price' => 3000,
            'extra_ad_price' => 1000,
        ]);
        $user = $this->createUserWithTariff($tariff);
        $this->createActivePromos($user, 1);

        $cost = CalculateAdCostAction::run($user, 5, false);

        $this->assertFalse($cost->isFree);
        $this->assertSame(PromoCostType::EXTRA, $cost->type);
        $this->assertSame(1000, $cost->dailyCost);
        $this->assertSame(5000, $cost->totalCost);
    }

    public function test_user_without_tariff_gets_free_ads(): void
    {
        $user = $this->createUserWithTariff();
        $this->createActivePromos($user, 5);

        $cost = CalculateAdCostAction::run($user, 10);

        $this->assertTrue($cost->isFree);
        $this->assertSame(PromoCostType::NO_TARIFF, $cost->type);
        $this->assertSame(0, $cost->totalCost);
    }

    public function test_cost_calculation_scales_with_duration(): void
    {
        $tariff = $this->createTariffPlan([
            'ads_count' => 0,
            'extra_ad_price' => 500,
        ]);
        $user = $this->createUserWithTariff($tariff);
        $this->createActivePromos($user, 1);

        $cost1 = CalculateAdCostAction::run($user, 1);
        $cost7 = CalculateAdCostAction::run($user, 7);
        $cost30 = CalculateAdCostAction::run($user, 30);

        $this->assertSame(500, $cost1->totalCost);
        $this->assertSame(3500, $cost7->totalCost);
        $this->assertSame(15000, $cost30->totalCost);
    }

    public function test_tariff_plan_relations_work_correctly(): void
    {
        $tariff = $this->createTariffPlan();

        $this->createUserWithTariff($tariff);
        $this->createUserWithTariff($tariff);
        $this->createUserWithTariff($tariff);

        $this->assertSame(3, $tariff->users()->count());
    }

    /**
     * @param  array<string, int>  $attributes
     */
    private function createTariffPlan(array $attributes = []): TariffPlan
    {
        /** @var TariffPlan */
        return TariffPlan::factory()->create($attributes);
    }

    private function createUserWithTariff(?TariffPlan $tariff = null): User
    {
        /** @var User */
        return User::factory()->create([
            'tariff_plan_id' => $tariff?->id,
        ]);
    }

    private function createActivePromos(User $user, int $count): void
    {
        Promo::factory()->count($count)->create([
            'user_id' => $user->id,
            'started_at' => now(),
            'available_till' => now()->addDays(7),
        ]);
    }
}
