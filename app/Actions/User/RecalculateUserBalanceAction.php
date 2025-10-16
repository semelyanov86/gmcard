<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Enums\PaymentType;
use App\Models\Payment;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static int run(int $userId)
 */
final readonly class RecalculateUserBalanceAction
{
    use AsAction;

    public function handle(int $userId): int
    {
        $userModel = User::query()->findOrFail($userId);

        $sums = Payment::query()
            ->selectRaw(
                '
            SUM(CASE WHEN type = ? THEN amount ELSE 0 END) as incoming_sum,
            SUM(CASE WHEN type = ? THEN amount ELSE 0 END) as outgoing_sum
            ',
                [
                    PaymentType::INCOMING->value,
                    PaymentType::OUTGOING->value,
                ]
            )
            ->where('user_id', $userModel->id)
            ->first();

        $incoming = (int) (($sums->incoming_sum ?? 0));
        $outgoing = (int) (($sums->outgoing_sum ?? 0));
        $newBalance = $incoming - $outgoing;

        $rawBalance = $userModel->getRawOriginal('balance');
        $currentBalance = is_int($rawBalance) ? $rawBalance : 0;
        if ($currentBalance !== $newBalance) {
            $userModel->forceFill(['balance' => $newBalance])->save();
        }

        return $newBalance;
    }
}
