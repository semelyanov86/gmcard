<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\ApprovePromoData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class ApprovePromoAction
{
    use AsAction;

    public function handle(ApprovePromoData $dto): void
    {
        DB::transaction(function () use ($dto): void {
            $promo = Promo::findOrFail($dto->promoId);

            $promo->update([
                'moderation_status' => PromoModerationStatus::APPROVED,
                'approved_at' => now(),
                'approved_by' => $dto->moderatorId,
                'approving_notes' => $dto->message,
                'rejected_at' => null,
                'rejected_by' => null,
                'rejection_reason' => null,
            ]);

            if ($promo->started_at === null) {
                $promo->update(['started_at' => now()]);
            }

        });
    }
}
