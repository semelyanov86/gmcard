<?php

declare(strict_types=1);

namespace App\Actions\VirtualBalance;

use App\Data\VirtualBalanceData;
use App\Enums\PaymentType;
use App\Models\VirtualBalance;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

final readonly class CreditVirtualBalanceAction
{
    use AsAction;

    public function __construct(
        private RecalculateVirtualBalanceAction $recalculateAction
    ) {}

    /**
     * @throws Throwable
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

            $this->recalculateAction->handle($data->user_id);

            return $virtualBalance;
        });
    }
}