<?php

declare(strict_types=1);

namespace App\Actions\Payment;

use App\Actions\User\RecalculateUserBalanceAction;
use App\Data\PaymentData;
use App\Enums\PaymentType;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use RuntimeException;
use Throwable;

final readonly class CreatePaymentAction
{
    use AsAction;

    /**
     * @throws Throwable
     */
    public function handle(PaymentData $dto): Payment
    {
        return DB::transaction(function () use ($dto): Payment {
            $user = User::query()->whereKey($dto->userId)->lockForUpdate()->firstOrFail();

            $amountCents = (int) $dto->amount->getMoney()->getAmount();
            if ($dto->type === PaymentType::OUTGOING) {
                $currentBalance = (int) $user->balance;
                if ($amountCents > $currentBalance) {
                    throw new RuntimeException('Недостаточно средств: нельзя списать больше, чем на счёте.');
                }
            }

            $payment = new Payment();
            $payment->payment_date = $dto->paymentDate?->toDateTimeString() ?? now()->toDateTimeString();
            $payment->amount = (int) $dto->amount->getMoney()->getAmount();
            $payment->type = $dto->type->value;
            $payment->description = $dto->description;
            $payment->transaction_id = $dto->transactionId;
            $payment->user_id = $dto->userId;
            $payment->save();

            if ($payment->transaction_id === null) {
                $payment->transaction_id = $payment->id;
                $payment->save();
            }

            RecalculateUserBalanceAction::run($dto->userId);

            return $payment;
        });
    }
}
