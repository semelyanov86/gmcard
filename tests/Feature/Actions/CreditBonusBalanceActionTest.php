<?php

declare(strict_types=1);

namespace Tests\Feature\Actions;

use App\Actions\CreditBonusBalanceAction;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Override;

class CreditBonusBalanceActionTest extends TestCase
{
    use RefreshDatabase;

    private CreditBonusBalanceAction $action;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = app(CreditBonusBalanceAction::class);
    }

    public function test_it_sets_bonus_balance_for_new_user(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['bonus_balance' => 0]);
        $bonusAmount = 100;

        $this->action->handle($user->id, $bonusAmount);

        $user->refresh();
        $this->assertEquals($bonusAmount, $user->bonus_balance);
    }

    public function test_it_overwrites_existing_bonus_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['bonus_balance' => 50]);
        $newBonusAmount = 200;

        $this->action->handle($user->id, $newBonusAmount);

        $user->refresh();
        $this->assertEquals($newBonusAmount, $user->bonus_balance);
    }

    public function test_it_can_set_zero_bonus_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['bonus_balance' => 100]);

        $this->action->handle($user->id, 0);

        $user->refresh();
        $this->assertEquals(0, $user->bonus_balance);
    }

    public function test_it_throws_exception_for_non_existent_user(): void
    {
        $nonExistentUserId = 99999;

        $this->expectException(ModelNotFoundException::class);
        $this->action->handle($nonExistentUserId, 100);
    }
}
