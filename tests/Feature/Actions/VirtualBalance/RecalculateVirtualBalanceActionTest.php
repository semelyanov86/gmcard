<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\VirtualBalance;

use App\Actions\VirtualBalance\RecalculateVirtualBalanceAction;
use App\Enums\PaymentType;
use App\Models\User;
use App\Models\VirtualBalance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Override;

class RecalculateVirtualBalanceActionTest extends TestCase
{
    use RefreshDatabase;

    private RecalculateVirtualBalanceAction $action;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new RecalculateVirtualBalanceAction();
    }

    public function test_it_correctly_calculates_balance_with_incoming_and_outgoing_operations(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 0]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 50,
            'type' => PaymentType::OUTGOING,
        ]);

        $this->action->handle($user->id);
        $user->refresh();

        $this->assertEquals(50, $user->virtual_balance);
    }

    public function test_it_throws_exception_when_balance_becomes_negative(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 0]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 100,
            'type' => PaymentType::OUTGOING,
        ]);

        $this->expectException(ValidationException::class);
        $this->action->handle($user->id);
    }

    public function test_it_handles_user_without_operations(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 100]);

        $this->action->handle($user->id);
        $user->refresh();

        $this->assertEquals(0, $user->virtual_balance);
    }

    public function test_it_handles_zero_balance_correctly(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 999]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 100,
            'type' => PaymentType::OUTGOING,
        ]);

        $this->action->handle($user->id);
        $user->refresh();

        $this->assertEquals(0, $user->virtual_balance);
    }

    public function test_it_handles_multiple_operations_correctly(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 0]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 50,
            'type' => PaymentType::INCOMING,
        ]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 30,
            'type' => PaymentType::OUTGOING,
        ]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 20,
            'type' => PaymentType::OUTGOING,
        ]);

        $this->action->handle($user->id);
        $user->refresh();

        $this->assertEquals(100, $user->virtual_balance);
    }

    public function test_it_recalculates_only_for_specific_user(): void
    {
        /** @var User $user1 */
        $user1 = User::factory()->create(['virtual_balance' => 0]);
        VirtualBalance::factory()->create([
            'user_id' => $user1->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);
        VirtualBalance::factory()->create([
            'user_id' => $user1->id,
            'amount' => 30,
            'type' => PaymentType::OUTGOING,
        ]);
        /** @var User $user2 */
        $user2 = User::factory()->create(['virtual_balance' => 0]);
        VirtualBalance::factory()->create([
            'user_id' => $user2->id,
            'amount' => 200,
            'type' => PaymentType::INCOMING,
        ]);
        /** @var User $user3 */
        $user3 = User::factory()->create(['virtual_balance' => 500]);

        $this->action->handle($user1->id);
        $user1->refresh();
        $user2->refresh();
        $user3->refresh();

        $this->assertEquals(70, $user1->virtual_balance);
        $this->assertEquals(0, $user2->virtual_balance);
        $this->assertEquals(500, $user3->virtual_balance);
    }
}
