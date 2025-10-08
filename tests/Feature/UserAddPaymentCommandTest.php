<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAddPaymentCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_incoming_payment_via_command(): void
    {
        $user = User::factory()->create(['balance' => 0]);

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '100.50',
            'type' => 'incoming',
            'description' => 'Test payment',
        ])
            ->assertExitCode(0)
            ->expectsOutput('Платёж создан: ID=1');

        $this->assertDatabaseHas('payments', [
            'user_id' => $user->id,
            'amount' => 10050,
            'type' => 'Поступление',
            'description' => 'Test payment',
        ]);

        $user->refresh();
        $this->assertSame(10050, (int) $user->balance);
    }

    public function test_creates_outgoing_payment_via_command(): void
    {
        $user = User::factory()->create(['balance' => 0]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 10000,
            'type' => 'Поступление',
        ]);

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '50',
            'type' => 'outgoing',
            'description' => 'Test withdrawal',
        ])
            ->assertExitCode(0);

        $this->assertDatabaseHas('payments', [
            'user_id' => $user->id,
            'amount' => 5000,
            'type' => 'Списание',
        ]);

        $user->refresh();
        $this->assertSame(5000, (int) $user->balance);
    }

    public function test_supports_russian_type_names(): void
    {
        $user = User::factory()->create(['balance' => 0]);

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '100',
            'type' => 'Поступление',
            'description' => 'Russian type',
        ])
            ->assertExitCode(0);

        $this->assertDatabaseHas('payments', [
            'user_id' => $user->id,
            'type' => 'Поступление',
        ]);
    }

    public function test_fails_when_user_not_found(): void
    {
        $this->artisan('user:add-payment', [
            'user_id' => 999999,
            'amount' => '100',
            'type' => 'incoming',
            'description' => 'Test',
        ])
            ->assertExitCode(1)
            ->expectsOutput('User not found: 999999');
    }

    public function test_fails_with_invalid_amount(): void
    {
        $user = User::factory()->create();

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => 'invalid',
            'type' => 'incoming',
            'description' => 'Test',
        ])
            ->assertExitCode(1)
            ->expectsOutput('Amount must be a positive number (e.g., 100 or 99.50).');
    }

    public function test_fails_with_negative_amount(): void
    {
        $user = User::factory()->create();

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '-100',
            'type' => 'incoming',
            'description' => 'Test',
        ])
            ->assertExitCode(1)
            ->expectsOutput('Amount must be a positive number (e.g., 100 or 99.50).');
    }

    public function test_fails_with_invalid_type(): void
    {
        $user = User::factory()->create();

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '100',
            'type' => 'invalid_type',
            'description' => 'Test',
        ])
            ->assertExitCode(1)
            ->expectsOutput('Тип должен быть: incoming, outgoing, Поступление, Списание');
    }

    public function test_fails_when_insufficient_funds(): void
    {
        $user = User::factory()->create(['balance' => 5000]);

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '100',
            'type' => 'outgoing',
            'description' => 'Too much',
        ])
            ->assertExitCode(1)
            ->expectsOutput('Недостаточно средств: нельзя списать больше, чем на счёте.');

        $user->refresh();
        $this->assertSame(5000, (int) $user->balance);
    }

    public function test_accepts_custom_transaction_id(): void
    {
        $user = User::factory()->create(['balance' => 0]);

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '100',
            'type' => 'incoming',
            'description' => 'Test',
            '--tx' => '12345',
        ])
            ->assertExitCode(0);

        $this->assertDatabaseHas('payments', [
            'user_id' => $user->id,
            'transaction_id' => 12345,
        ]);
    }

    public function test_fails_with_invalid_transaction_id(): void
    {
        $user = User::factory()->create();

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '100',
            'type' => 'incoming',
            'description' => 'Test',
            '--tx' => 'invalid',
        ])
            ->assertExitCode(1)
            ->expectsOutput('--tx должен быть целым числом');
    }

    public function test_shows_balance_correction_info(): void
    {
        $user = User::factory()->create(['balance' => 5000]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 3000,
            'type' => 'Списание',
        ]);

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '10',
            'type' => 'incoming',
            'description' => 'Test',
        ])
            ->assertExitCode(0)
            ->expectsOutputToContain('Коррекция по ранее неучтённым платежам');
    }

    public function test_displays_all_balance_information(): void
    {
        $user = User::factory()->create(['balance' => 0]);

        Payment::factory()->create([
            'user_id' => $user->id,
            'amount' => 10000,
            'type' => 'Поступление',
        ]);

        $this->artisan('user:add-payment', [
            'user_id' => $user->id,
            'amount' => '20',
            'type' => 'outgoing',
            'description' => 'Test',
        ])
            ->assertExitCode(0)
            ->expectsOutputToContain('Платёж создан')
            ->expectsOutputToContain('Пользователь:')
            ->expectsOutputToContain('Тип:')
            ->expectsOutputToContain('Описание:')
            ->expectsOutputToContain('Сумма:')
            ->expectsOutputToContain('Предыдущий баланс:')
            ->expectsOutputToContain('Новый баланс:');
    }
}

