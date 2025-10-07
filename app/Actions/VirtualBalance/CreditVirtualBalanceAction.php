<?php

declare(strict_types=1);

namespace App\Actions\VirtualBalance;

use App\Data\VirtualBalanceData;
use App\Enums\PaymentType;
use App\Models\User;
use App\Models\VirtualBalance;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class CreditVirtualBalanceAction
{
    use AsAction;

    /**
     * @throws \Throwable
     */
    public function handle(VirtualBalanceData $data): VirtualBalance
    {
        return DB::transaction(function () use ($data) {
            $virtualBalance = VirtualBalance::create([
                'user_id' => $data->user_id,
                'compensation_date' => $data->compensation_date,
                'amount' => $data->amount,
                'type' => PaymentType::INCOMING,
                'description' => $data->description,
            ]);

            User::where('id', $data->user_id)
                ->increment('virtual_balance', $data->amount);

            return $virtualBalance;
        });
    }
}

