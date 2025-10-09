<?php

declare(strict_types=1);

namespace App\Actions\VirtualBalance;

use App\Enums\PaymentType;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

final readonly class RecalculateVirtualBalanceAction
{
    use AsAction;

    /**
     * @throws Throwable
     */
    public function handle(int $userId): void
    {
        DB::transaction(function () use ($userId) {
            DB::statement("
                UPDATE users u
                SET u.virtual_balance = (
                    SELECT COALESCE(SUM(
                        CASE
                            WHEN vb.type = ? THEN vb.amount
                            WHEN vb.type = ? THEN -vb.amount
                        END
                    ), 0)
                    FROM virtual_balances vb
                    WHERE vb.user_id = u.id
                )
                WHERE u.id = ?
            ", [
                PaymentType::INCOMING->value,
                PaymentType::OUTGOING->value,
                $userId
            ]);
        });
    }
}