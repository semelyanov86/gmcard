<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\VirtualBalance;

use App\Actions\VirtualBalance\DebitVirtualBalanceAction;
use App\Data\VirtualBalanceData;
use App\Enums\PaymentType;
use App\Models\User;
use App\Models\VirtualBalance;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Override;

class DebitVirtualBalanceActionTest extends TestCase
{
    use RefreshDatabase;

    private DebitVirtualBalanceAction $action;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = app(DebitVirtualBalanceAction::class);
    }

    public function test_it_creates_debit_record_and_recalculates_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 100]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);

        $data = new VirtualBalanceData(
            user_id: $user->id,
            compensation_date: CarbonImmutable::now(),
            amount: 30,
            type: PaymentType::OUTGOING,
            description: 'Test debit'
        );

        $result = $this->action->handle($data);
        $user->refresh();

        $this->assertEquals($data->amount, $result->amount);
        $this->assertEquals(PaymentType::OUTGOING, $result->type);
        $this->assertEquals('Test debit', $result->description);

        $this->assertEquals(70, $user->virtual_balance); // 100 - 30 = 70
    }

    public function test_it_throws_exception_when_insufficient_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 50]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 50,
            'type' => PaymentType::INCOMING,
        ]);

        $data = new VirtualBalanceData(
            user_id: $user->id,
            compensation_date: CarbonImmutable::now(),
            amount: 100,
            type: PaymentType::OUTGOING,
            description: 'Test debit'
        );

        $this->expectException(ValidationException::class);
        $this->action->handle($data);
    }

    public function test_it_handles_exact_amount_debit(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 100]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);

        $data = new VirtualBalanceData(
            user_id: $user->id,
            compensation_date: CarbonImmutable::now(),
            amount: 100, // Debit exactly what's available
            type: PaymentType::OUTGOING,
            description: 'Test debit'
        );

        $this->action->handle($data);
        $user->refresh();

        $this->assertEquals(0, $user->virtual_balance);
    }

    public function test_it_debits_only_for_specific_user(): void
    {
        /** @var User $user1 */
        $user1 = User::factory()->create(['virtual_balance' => 100]);
        VirtualBalance::factory()->create([
            'user_id' => $user1->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);
        /** @var User $user2 */
        $user2 = User::factory()->create(['virtual_balance' => 200]);
        VirtualBalance::factory()->create([
            'user_id' => $user2->id,
            'amount' => 200,
            'type' => PaymentType::INCOMING,
        ]);
        /** @var User $user3 */
        $user3 = User::factory()->create(['virtual_balance' => 300]);
        VirtualBalance::factory()->create([
            'user_id' => $user3->id,
            'amount' => 300,
            'type' => PaymentType::INCOMING,
        ]);
        $data = new VirtualBalanceData(
            user_id: $user1->id,
            compensation_date: CarbonImmutable::now(),
            amount: 50,
            type: PaymentType::OUTGOING,
            description: 'Debit for user1'
        );

        $this->action->handle($data);
        $user1->refresh();
        $user2->refresh();
        $user3->refresh();

        $this->assertEquals(50, $user1->virtual_balance);
        $this->assertEquals(200, $user2->virtual_balance);
        $this->assertEquals(300, $user3->virtual_balance);
    }
}
