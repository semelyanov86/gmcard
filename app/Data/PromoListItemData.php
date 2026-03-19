<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use App\Models\PromoType;
use Spatie\LaravelData\Data;

final class PromoListItemData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public ?string $img,
        public string $status,
        public ?string $type,
        public ?string $discount,
        public ?int $promoTypeId,
        public ?string $promoTypeIcon,
        public ?string $startedAt,
        public ?string $availableTill,
        public ?string $code,
        public ?string $rejectionReason = null,
        public ?string $rejectionMessage = null,
    ) {}

    public static function fromModel(Promo $promo): self
    {
        return self::fromPromo($promo);
    }

    public static function fromPromo(Promo $promo): self
    {
        $promo->loadMissing('promoType');

        $status = self::determineStatus($promo);

        $resolvedPromoType = $promo->promoType;
        if ($resolvedPromoType === null) {
            $resolvedPromoType = PromoType::query()
                ->where('name', $promo->type->value)
                ->first();
        }

        $iconPath = $resolvedPromoType?->icon;
        $promoTypeIcon = $iconPath !== null ? asset('storage/' . $iconPath) : null;

        return new self(
            id: $promo->id,
            name: $promo->name,
            description: $promo->description,
            img: $promo->img,
            status: $status,
            type: $promo->type->value,
            discount: $promo->discount,
            promoTypeId: $promo->promo_type_id ?? $resolvedPromoType?->id,
            promoTypeIcon: $promoTypeIcon,
            startedAt: $promo->started_at?->toIso8601String(),
            availableTill: $promo->available_till?->toIso8601String(),
            code: $promo->code,
            rejectionReason: $promo->rejection_reason,
            rejectionMessage: $promo->rejection_message,
        );
    }

    private static function determineStatus(Promo $promo): string
    {
        if ($promo->moderation_status === PromoModerationStatus::PENDING) {
            return 'moderation';
        }

        if ($promo->moderation_status === PromoModerationStatus::REJECTED) {
            return 'rejected';
        }

        if ($promo->moderation_status === PromoModerationStatus::DRAFT || $promo->started_at === null) {
            return 'draft';
        }

        if ($promo->available_till !== null && $promo->available_till->isPast()) {
            return 'completed';
        }

        return 'active';
    }
}
