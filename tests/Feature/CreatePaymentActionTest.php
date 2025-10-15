<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Actions\Payment\CreatePaymentAction;
use App\Data\PaymentData;
use App\Enums\PaymentType;
use App\Models\Payment;
use App\Models\User;
use App\ValueObjects\MoneyValueObject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use RuntimeException;
use Tests\TestCase;

class CreatePaymentActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_incoming_payment_and_updates_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);
        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('100.50', 'RUB'),
            type: PaymentType::INCOMING,
            description: 'Test incoming payment',
        );

        $payment = CreatePaymentAction::run($dto);
        $user->refresh();

        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'user_id' => $user->id,
            'amount' => 10050,
            'type' => 'Поступление',
            'description' => 'Test incoming payment',
        ]);

        $this->assertSame(10050, (int) $user->balance);
    }

    public function test_creates_outgoing_payment_and_updates_balance(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);
        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 10000,
            'type' => PaymentType::INCOMING,
        ]);
        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('50', 'RUB'),
            type: PaymentType::OUTGOING,
            description: 'Test outgoing payment',
        );

        $payment = CreatePaymentAction::run($dto);
        $user->refresh();

        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'user_id' => $user->id,
            'amount' => 5000,
            'type' => 'Списание',
        ]);

        $this->assertSame(5000, (int) $user->balance);
    }

    public function test_prevents_negative_balance_on_outgoing_payment(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);
        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 5000,
            'type' => PaymentType::INCOMING,
        ]);
        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('100', 'RUB'),
            type: PaymentType::OUTGOING,
            description: 'Attempt to overdraw',
        );

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Недостаточно средств: нельзя списать больше, чем на счёте.');

        CreatePaymentAction::run($dto);
    }

    public function test_prevents_negative_balance_when_actual_balance_differs_from_db(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 10000]);
        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 9000,
            'type' => PaymentType::OUTGOING,
        ]);
        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('20', 'RUB'),
            type: PaymentType::OUTGOING,
            description: 'Should fail',
        );

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Недостаточно средств');

        CreatePaymentAction::run($dto);
    }

    public function test_allows_exact_balance_deduction(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);
        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 10000,
            'type' => PaymentType::INCOMING,
        ]);
        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('100', 'RUB'),
            type: PaymentType::OUTGOING,
            description: 'Exact balance',
        );

        CreatePaymentAction::run($dto);
        $user->refresh();

        $this->assertSame(0, (int) $user->balance);
    }

    public function test_sets_transaction_id_to_payment_id_if_null(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);
        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('100', 'RUB'),
            type: PaymentType::INCOMING,
            description: 'Test',
            transactionId: null,
        );

        $payment = CreatePaymentAction::run($dto);

        $this->assertSame($payment->id, $payment->transaction_id);
    }

    public function test_keeps_custom_transaction_id_if_provided(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);
        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('100', 'RUB'),
            type: PaymentType::INCOMING,
            description: 'Test',
            transactionId: 99999,
        );

        $payment = CreatePaymentAction::run($dto);

        $this->assertSame(99999, $payment->transaction_id);
    }

    public function test_sets_payment_date_automatically_if_not_provided(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);
        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('100', 'RUB'),
            type: PaymentType::INCOMING,
            description: 'Test',
        );

        $payment = CreatePaymentAction::run($dto);

        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertNotNull($payment->payment_date);
        /** @phpstan-ignore property.nonObject */
        $this->assertEqualsWithDelta(now()->timestamp, $payment->payment_date->timestamp, 2);
    }

    public function test_uses_locks_to_prevent_race_conditions(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['balance' => 0]);
        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 5000,
            'type' => PaymentType::INCOMING,
        ]);
        $dto1 = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('30', 'RUB'),
            type: PaymentType::OUTGOING,
            description: 'First',
        );
        $dto2 = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString('30', 'RUB'),
            type: PaymentType::OUTGOING,
            description: 'Second',
        );

        CreatePaymentAction::run($dto1);

        $this->expectException(RuntimeException::class);
        CreatePaymentAction::run($dto2);
    }

    public function test_creates_payment_only_for_specific_user(): void
    {
        /** @var User $user1 */
        $user1 = User::factory()->create(['balance' => 10000]);
        Payment::factory()->create([
            'user_id' => $user1->id,
            'amount' => 10000,
            'type' => PaymentType::INCOMING,
        ]);
        /** @var User $user2 */
        $user2 = User::factory()->create(['balance' => 20000]);
        Payment::factory()->create([
            'user_id' => $user2->id,
            'amount' => 20000,
            'type' => PaymentType::INCOMING,
        ]);
        /** @var User $user3 */
        $user3 = User::factory()->create(['balance' => 30000]);
        Payment::factory()->create([
            'user_id' => $user3->id,
            'amount' => 30000,
            'type' => PaymentType::INCOMING,
        ]);
        $dto = new PaymentData(
            userId: $user1->id,
            amount: MoneyValueObject::fromString('50', 'RUB'),
            type: PaymentType::OUTGOING,
            description: 'Payment for user1',
        );

        CreatePaymentAction::run($dto);
        $user1->refresh();
        $user2->refresh();
        $user3->refresh();

        $this->assertSame(5000, (int) $user1->balance);
        $this->assertSame(20000, (int) $user2->balance);
        $this->assertSame(30000, (int) $user3->balance);
    }
}
