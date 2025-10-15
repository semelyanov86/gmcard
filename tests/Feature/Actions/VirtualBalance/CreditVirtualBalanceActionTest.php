<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\VirtualBalance;

use App\Actions\VirtualBalance\CreditVirtualBalanceAction;
use App\Data\VirtualBalanceData;
use App\Enums\PaymentType;
use App\Models\User;
use App\Models\VirtualBalance;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Override;

class CreditVirtualBalanceActionTest extends TestCase
{
    use RefreshDatabase;

    private CreditVirtualBalanceAction $action;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = app(CreditVirtualBalanceAction::class);
    }

    public function test_it_creates_credit_record_and_recalculates_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 0]);
        $data = new VirtualBalanceData(
            user_id: $user->id,
            compensation_date: CarbonImmutable::now(),
            amount: 100,
            type: PaymentType::INCOMING,
            description: 'Test credit'
        );

        $result = $this->action->handle($data);
        $user->refresh();

        $this->assertEquals($data->amount, $result->amount);
        $this->assertEquals(PaymentType::INCOMING, $result->type);
        $this->assertEquals('Test credit', $result->description);

        $this->assertEquals(100, $user->virtual_balance);
    }

    public function test_it_adds_to_existing_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 0]);
        VirtualBalance::factory()->create([
            'user_id' => $user->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);

        $data = new VirtualBalanceData(
            user_id: $user->id,
            compensation_date: CarbonImmutable::now(),
            amount: 50,
            type: PaymentType::INCOMING,
            description: 'Additional credit'
        );

        $this->action->handle($data);
        $user->refresh();

        $this->assertEquals(150, $user->virtual_balance);
    }

    public function test_it_handles_multiple_credit_operations(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['virtual_balance' => 0]);
        $data1 = new VirtualBalanceData(
            user_id: $user->id,
            compensation_date: CarbonImmutable::now(),
            amount: 100,
            type: PaymentType::INCOMING,
            description: 'First credit'
        );

        $data2 = new VirtualBalanceData(
            user_id: $user->id,
            compensation_date: CarbonImmutable::now(),
            amount: 50,
            type: PaymentType::INCOMING,
            description: 'Second credit'
        );

        $this->action->handle($data1);
        $this->action->handle($data2);
        $user->refresh();

        $this->assertEquals(150, $user->virtual_balance);
        $this->assertEquals(2, VirtualBalance::where('user_id', $user->id)->count());
    }

    public function test_it_credits_only_for_specific_user(): void
    {
        /** @var User $user1 */
        $user1 = User::factory()->create(['virtual_balance' => 0]);
        /** @var User $user2 */
        $user2 = User::factory()->create(['virtual_balance' => 100]);
        VirtualBalance::factory()->create([
            'user_id' => $user2->id,
            'amount' => 100,
            'type' => PaymentType::INCOMING,
        ]);
        /** @var User $user3 */
        $user3 = User::factory()->create(['virtual_balance' => 200]);
        VirtualBalance::factory()->create([
            'user_id' => $user3->id,
            'amount' => 200,
            'type' => PaymentType::INCOMING,
        ]);
        $data = new VirtualBalanceData(
            user_id: $user1->id,
            compensation_date: CarbonImmutable::now(),
            amount: 50,
            type: PaymentType::INCOMING,
            description: 'Credit for user1'
        );

        $this->action->handle($data);
        $user1->refresh();
        $user2->refresh();
        $user3->refresh();

        $this->assertEquals(50, $user1->virtual_balance);
        $this->assertEquals(100, $user2->virtual_balance);
        $this->assertEquals(200, $user3->virtual_balance);
    }
}
