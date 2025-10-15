<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Enums\PaymentType;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRecalculateBalancesCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_recalculates_balances_for_all_users(): void
    {
        /** @var User $user1 */
        $user1 = User::factory()->create(['balance' => 0]);
        Payment::factory()->create([
            'user_id' => $user1->id,
            'amount' => 10000,
            'type' => PaymentType::INCOMING,
        ]);
        /** @var User $user2 */
        $user2 = User::factory()->create(['balance' => 0]);
        Payment::factory()->create([
            'user_id' => $user2->id,
            'amount' => 5000,
            'type' => PaymentType::INCOMING,
        ]);
        /** @var User $user3 */
        $user3 = User::factory()->create(['balance' => 0]);
        Payment::factory()->create([
            'user_id' => $user3->id,
            'amount' => 3000,
            'type' => PaymentType::INCOMING,
        ]);

        $this->artisan('user:recalc-balances')
            ->assertExitCode(0);
        $user1->refresh();
        $user2->refresh();
        $user3->refresh();

        $this->assertSame(10000, $user1->getRawOriginal('balance'));
        $this->assertSame(5000, $user2->getRawOriginal('balance'));
        $this->assertSame(3000, $user3->getRawOriginal('balance'));
    }

    public function test_respects_chunk_size_option(): void
    {
        User::factory()->count(15)->create(['balance' => 0]);

        $this->artisan('user:recalc-balances', ['--chunk' => '5'])
            ->assertExitCode(0);

        $this->assertSame(15, User::count());
    }
}
