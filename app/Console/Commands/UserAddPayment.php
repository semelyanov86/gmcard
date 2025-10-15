<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\Payment\CreatePaymentAction;
use App\Data\PaymentData;
use App\Enums\PaymentType;
use App\Models\Payment;
use App\Models\User;
use App\ValueObjects\MoneyValueObject;
use Illuminate\Console\Command;
use RuntimeException;
use Throwable;

final class UserAddPayment extends Command
{
    protected $signature = 'user:add-payment {user_id} {amount} {type} {description} {--tx=}';

    protected $description = 'Создать платёж пользователю и пересчитать его баланс';

    public function handle(): int
    {
        $userId = (int) $this->argument('user_id');
        $amountInput = (string) $this->argument('amount');
        $typeInput = (string) $this->argument('type');
        $description = (string) $this->argument('description');
        $txInput = $this->option('tx');

        $user = User::query()->find($userId);
        if ($user === null) {
            $this->error('User not found: ' . $userId);

            return self::FAILURE;
        }

        if (! is_numeric($amountInput) || (float) $amountInput <= 0) {
            $this->error('Amount must be a positive number (e.g., 100 or 99.50).');

            return self::FAILURE;
        }

        $type = $this->mapType($typeInput);
        if ($type === null) {
            $this->error('Тип должен быть: incoming, outgoing, Поступление, Списание');

            return self::FAILURE;
        }

        $transactionId = null;
        if ($txInput !== null && $txInput !== '') {
            if (! ctype_digit((string) $txInput)) {
                $this->error('--tx должен быть целым числом');

                return self::FAILURE;
            }
            $transactionId = (int) $txInput;
        }

        $dto = new PaymentData(
            userId: $user->id,
            amount: MoneyValueObject::fromString($amountInput, 'RUB'),
            type: $type,
            description: $description,
            transactionId: $transactionId,
        );

        $rawBalance = $user->getRawOriginal('balance');
        $previousBalanceCents = is_int($rawBalance) ? $rawBalance : 0;
        $amountCents = (int) $dto->amount->getMoney()->getAmount();
        $paymentImpactCents = $type === PaymentType::INCOMING ? $amountCents : -$amountCents;

        try {
            /** @var Payment $payment */
            $payment = CreatePaymentAction::run($dto);
        } catch (RuntimeException $e) {
            $this->error($e->getMessage());

            return self::FAILURE;
        } catch (Throwable $e) {
            $this->error('Ошибка при создании платежа: ' . $e->getMessage());

            return self::FAILURE;
        }

        $user->refresh();
        $rawNewBalance = $user->getRawOriginal('balance');
        $newBalanceCents = is_int($rawNewBalance) ? $rawNewBalance : 0;
        $deltaCents = $newBalanceCents - $previousBalanceCents;
        $correctionCents = $deltaCents - $paymentImpactCents;

        $this->info('Платёж создан: ID=' . $payment->id);
        $this->line('Пользователь: ' . $user->id);
        $this->line('Тип: ' . $dto->type->value);
        $this->line('Описание: ' . $dto->description);
        $this->line('Сумма: ' . $dto->amount->toDisplayValue());

        $this->line('Предыдущий баланс: ' . MoneyValueObject::fromCents($previousBalanceCents, 'RUB')->toDisplayValue());
        $this->line('Изменение всего: ' . MoneyValueObject::fromCents(abs($deltaCents), 'RUB')->toDisplayValue() . ($deltaCents >= 0 ? ' (увеличение)' : ' (уменьшение)'));
        $this->line('Влияние текущего платежа: ' . MoneyValueObject::fromCents(abs($paymentImpactCents), 'RUB')->toDisplayValue() . ($paymentImpactCents >= 0 ? ' (увеличение)' : ' (уменьшение)'));
        if ($correctionCents !== 0) {
            $this->line('Коррекция по ранее неучтённым платежам: ' . MoneyValueObject::fromCents(abs($correctionCents), 'RUB')->toDisplayValue() . ($correctionCents >= 0 ? ' (увеличение)' : ' (уменьшение)'));
        }
        $this->info('Новый баланс: ' . MoneyValueObject::fromCents($newBalanceCents, 'RUB')->toDisplayValue());
        $this->line('Новый баланс (копейки): ' . $newBalanceCents);

        return self::SUCCESS;
    }

    private function mapType(string $input): ?PaymentType
    {
        $normalized = mb_strtolower(mb_trim($input));

        return match ($normalized) {
            'incoming', 'поступление' => PaymentType::INCOMING,
            'outgoing', 'списание' => PaymentType::OUTGOING,
            default => null,
        };
    }
}
