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

        $this->assertInstanceOf(VirtualBalance::class, $result);
        $this->assertEquals($data->amount, $result->amount);
        $this->assertEquals(PaymentType::OUTGOING, $result->type);
        $this->assertEquals('Test debit', $result->description);

        $user->refresh();
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

        $result = $this->action->handle($data);

        $this->assertInstanceOf(VirtualBalance::class, $result);
        $user->refresh();
        $this->assertEquals(0, $user->virtual_balance);
    }
}
