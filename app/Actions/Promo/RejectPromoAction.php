<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\RejectPromoData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class RejectPromoAction
{
    use AsAction;

    public function handle(RejectPromoData $dto): Promo
    {
        return DB::transaction(function () use ($dto): Promo {
            $promo = Promo::findOrFail($dto->promoId);

            $promo->update([
                'moderation_status' => PromoModerationStatus::REJECTED,
                'rejected_at' => now(),
                'rejected_by' => $dto->moderatorId,
                'rejection_reason' => $dto->rejectionReason,
                'approved_at' => null,
                'approved_by' => null,
                'approving_notes' => null,
            ]);

            /** @var Promo $promo */
            $promo = $promo->fresh();

            return $promo;
        });
    }
}
