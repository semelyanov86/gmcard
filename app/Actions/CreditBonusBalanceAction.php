<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static void run(int $userId, int $bonusAmount)
 */
final readonly class CreditBonusBalanceAction
{
    use AsAction;

    public function handle(int $userId, int $bonusAmount): void
    {
        $user = User::findOrFail($userId);
        $user->bonus_balance = $bonusAmount;
        $user->save();
    }
}
