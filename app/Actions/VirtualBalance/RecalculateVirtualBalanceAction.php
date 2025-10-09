<?php

declare(strict_types=1);

namespace App\Actions\VirtualBalance;

use App\Enums\PaymentType;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

final readonly class RecalculateVirtualBalanceAction
{
    use AsAction;

    /**
     * @throws Throwable
     * @throws ValidationException
     */
    public function handle(int $userId): void
    {
        DB::transaction(function () use ($userId): void {
            $balance = DB::selectOne('
                SELECT COALESCE(SUM(
                    CASE
                        WHEN vb.type = ? THEN vb.amount
                        WHEN vb.type = ? THEN -vb.amount
                    END
                ), 0) as balance
                FROM virtual_balances vb
                WHERE vb.user_id = ?
            ', [
                PaymentType::INCOMING->value,
                PaymentType::OUTGOING->value,
                $userId,
            ])->balance;

            if ($balance < 0) {
                throw ValidationException::withMessages([
                    'balance' => "Balance cannot be negative. Current calculation: {$balance}. Please check virtual_balances records.",
                ]);
            }

            DB::statement('UPDATE users SET virtual_balance = ? WHERE id = ?', [
                $balance,
                $userId,
            ]);
        });
    }
}
