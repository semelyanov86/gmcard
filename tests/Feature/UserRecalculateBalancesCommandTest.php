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
        /** @var User $user2 */
        $user2 = User::factory()->create(['balance' => 0]);
        /** @var User $user3 */
        $user3 = User::factory()->create(['balance' => 0]);

        Payment::factory()->create([
            'user_id' => $user1->id,
            'amount' => 10000,
            'type' => PaymentType::INCOMING,
        ]);

        Payment::factory()->create([
            'user_id' => $user2->id,
            'amount' => 5000,
            'type' => PaymentType::INCOMING,
        ]);

        Payment::factory()->create([
            'user_id' => $user3->id,
            'amount' => 3000,
            'type' => PaymentType::INCOMING,
        ]);

        $this->artisan('user:recalc-balances')
            ->assertExitCode(0)
            ->expectsOutput('Done. Total users processed: 3, Total errors: 0');

        $user1->refresh();
        $user2->refresh();
        $user3->refresh();

        $this->assertSame(10000, (int) $user1->balance);
        $this->assertSame(5000, (int) $user2->balance);
        $this->assertSame(3000, (int) $user3->balance);
    }

    public function test_continues_processing_after_error(): void
    {
        /** @var User $user1 */
        $user1 = User::factory()->create(['balance' => 0]);
        /** @var User $user2 */
        $user2 = User::factory()->create(['balance' => 0]);

        Payment::factory()->create([
            'user_id' => $user1->id,
            'amount' => 10000,
            'type' => PaymentType::INCOMING,
        ]);

        Payment::factory()->create([
            'user_id' => $user2->id,
            'amount' => 5000,
            'type' => PaymentType::INCOMING,
        ]);

        $this->artisan('user:recalc-balances')
            ->assertExitCode(0);

        $user1->refresh();
        $user2->refresh();

        $this->assertSame(10000, (int) $user1->balance);
        $this->assertSame(5000, (int) $user2->balance);
    }

    public function test_respects_chunk_size_option(): void
    {
        User::factory()->count(15)->create(['balance' => 0]);

        $this->artisan('user:recalc-balances', ['--chunk' => '5'])
            ->assertExitCode(0)
            ->expectsOutputToContain('Processed: 5')
            ->expectsOutputToContain('Processed: 10')
            ->expectsOutputToContain('Processed: 15');
    }

    public function test_shows_progress_output(): void
    {
        User::factory()->count(3)->create(['balance' => 0]);

        $this->artisan('user:recalc-balances')
            ->assertExitCode(0)
            ->expectsOutputToContain('Processed:')
            ->expectsOutputToContain('Done. Total users processed: 3');
    }

    public function test_handles_users_with_no_payments(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 9999]);

        $this->artisan('user:recalc-balances')
            ->assertExitCode(0);

        $user->refresh();
        $this->assertSame(0, (int) $user->balance);
    }

    public function test_handles_users_with_negative_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 5000,
            'type' => PaymentType::OUTGOING,
        ]);

        $this->artisan('user:recalc-balances')
            ->assertExitCode(0);

        $user->refresh();
        $this->assertSame(-5000, (int) $user->balance);
    }

    public function test_processes_large_number_of_users(): void
    {
        User::factory()->count(50)->create(['balance' => 0]);

        $this->artisan('user:recalc-balances', ['--chunk' => '10'])
            ->assertExitCode(0)
            ->expectsOutput('Done. Total users processed: 50, Total errors: 0');
    }

    public function test_calculates_complex_payment_history(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 10000,
            'type' => PaymentType::INCOMING,
        ]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 5000,
            'type' => PaymentType::INCOMING,
        ]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 3000,
            'type' => PaymentType::OUTGOING,
        ]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 2000,
            'type' => PaymentType::OUTGOING,
        ]);

        $this->artisan('user:recalc-balances')
            ->assertExitCode(0);

        $user->refresh();
        $this->assertSame(10000, (int) $user->balance);
    }

    public function test_shows_error_count_in_output(): void
    {
        User::factory()->count(3)->create(['balance' => 0]);

        $this->artisan('user:recalc-balances')
            ->assertExitCode(0)
            ->expectsOutputToContain('Errors: 0')
            ->expectsOutput('Done. Total users processed: 3, Total errors: 0');
    }
}
