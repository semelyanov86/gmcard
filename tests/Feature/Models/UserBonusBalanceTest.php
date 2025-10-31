<?php

declare(strict_types=1);

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserBonusBalanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_bonus_balance_attribute(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['bonus_balance' => 150]);

        $this->assertEquals(150, $user->bonus_balance);
    }

    public function test_user_bonus_balance_can_be_null(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['bonus_balance' => null]);

        $this->assertNull($user->bonus_balance);
    }

    public function test_user_bonus_balance_is_cast_to_integer(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['bonus_balance' => '250']);

        $this->assertIsInt($user->bonus_balance);
        $this->assertEquals(250, $user->bonus_balance);
    }

    public function test_user_bonus_balance_can_be_updated(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['bonus_balance' => 100]);

        $user->update(['bonus_balance' => 200]);

        $this->assertEquals(200, $user->bonus_balance);
    }

    public function test_user_bonus_balance_can_be_zero(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['bonus_balance' => 0]);

        $this->assertEquals(0, $user->bonus_balance);
        $this->assertIsInt($user->bonus_balance);
    }
}
