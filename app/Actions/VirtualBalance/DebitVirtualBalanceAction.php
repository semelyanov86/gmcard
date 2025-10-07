<?php

declare(strict_types=1);

namespace App\Actions\VirtualBalance;

use App\Data\VirtualBalanceData;
use App\Enums\PaymentType;
use App\Models\User;
use App\Models\VirtualBalance;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\Concerns\AsAction;

class DebitVirtualBalanceAction
{
    use AsAction;

    /**
     * @throws \Throwable
     * @throws ValidationException
     */
    public function handle(VirtualBalanceData $data): VirtualBalance
    {
        return DB::transaction(function () use ($data) {
            $user = User::findOrFail($data->user_id);

            if ($user->virtual_balance < $data->amount) {
                throw ValidationException::withMessages([
                    'amount' => 'Insufficient points. Available: ' . $user->virtual_balance,
                ]);
            }

            $virtualBalance = VirtualBalance::create([
                'user_id' => $data->user_id,
                'compensation_date' => $data->compensation_date,
                'amount' => $data->amount,
                'type' => PaymentType::OUTGOING,
                'description' => $data->description,
            ]);

            User::where('id', $data->user_id)
                ->decrement('virtual_balance', $data->amount);

            return $virtualBalance;
        });
    }
}

