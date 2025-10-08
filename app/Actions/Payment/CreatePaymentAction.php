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
            $actualBalance = RecalculateUserBalanceAction::run($dto->userId);

            $amountCents = (int) $dto->amount->getMoney()->getAmount();
            if ($dto->type === PaymentType::OUTGOING) {
                if ($amountCents > $actualBalance) {
                    throw new RuntimeException('Недостаточно средств: нельзя списать больше, чем на счёте.');
                }
            }

            $attributes = $dto->toArray();
            $attributes['payment_date'] ??= now();

            $payment = Payment::create($attributes);

            if ($payment->transaction_id === null) {
                $payment->transaction_id = $payment->id;
                $payment->save();
            }

            RecalculateUserBalanceAction::run($dto->userId);

            return $payment;
        });
    }
}
