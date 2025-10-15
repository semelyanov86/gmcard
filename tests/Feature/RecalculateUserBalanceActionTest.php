<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Actions\User\RecalculateUserBalanceAction;
use App\Enums\PaymentType;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecalculateUserBalanceActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_calculates_balance_correctly_with_incoming_payments(): void
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

        $newBalance = RecalculateUserBalanceAction::run($user->id);

        $user->refresh();
        $this->assertSame(15000, $user->getRawOriginal('balance'));
    }

    public function test_calculates_balance_correctly_with_outgoing_payments(): void
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
            'amount' => 3000,
            'type' => PaymentType::OUTGOING,
        ]);

        $newBalance = RecalculateUserBalanceAction::run($user->id);

        $user->refresh();
        $this->assertSame(7000, $user->getRawOriginal('balance'));
    }

    public function test_calculates_balance_with_mixed_payments(): void
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

        $newBalance = RecalculateUserBalanceAction::run($user->id);

        $user->refresh();
        $this->assertSame(10000, $user->getRawOriginal('balance'));
    }

    public function test_returns_zero_when_no_payments(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 99999]);

        $newBalance = RecalculateUserBalanceAction::run($user->id);

        $this->assertSame(0, $newBalance);
        $user->refresh();
        $this->assertSame(0, $user->getRawOriginal('balance'));
    }

    public function test_can_result_in_negative_balance_when_old_data_exists(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 5000,
            'type' => PaymentType::OUTGOING,
        ]);

        $newBalance = RecalculateUserBalanceAction::run($user->id);

        $user->refresh();
        $this->assertSame(-5000, $user->getRawOriginal('balance'));
    }

    public function test_updates_db_balance_only_when_different(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 10000]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 10000,
            'type' => PaymentType::INCOMING,
        ]);

        $originalUpdatedAt = $user->updated_at;

        sleep(1);

        RecalculateUserBalanceAction::run($user->id);

        $user->refresh();
        $this->assertSame(10000, $user->getRawOriginal('balance'));
    }

    public function test_isolates_users_balance_calculation(): void
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

        $balance1 = RecalculateUserBalanceAction::run($user1->id);
        $balance2 = RecalculateUserBalanceAction::run($user2->id);

        $this->assertSame(10000, $balance1);
        $this->assertSame(5000, $balance2);
    }

    public function test_throws_exception_for_non_existent_user(): void
    {
        $this->expectException(ModelNotFoundException::class);

        RecalculateUserBalanceAction::run(999999);
    }
}
