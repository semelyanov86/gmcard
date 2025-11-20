<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use Spatie\LaravelData\Data;

final class PromoListItemData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public ?string $img,
        public string $status,
        public ?string $startedAt,
        public ?string $availableTill,
        public ?string $code,
    ) {}

    public static function fromPromo(Promo $promo): self
    {
        $status = self::determineStatus($promo);

        return new self(
            id: $promo->id,
            name: $promo->name,
            description: $promo->description,
            img: $promo->img,
            status: $status,
            startedAt: $promo->started_at?->toIso8601String(),
            availableTill: $promo->available_till?->toIso8601String(),
            code: $promo->code,
        );
    }

    private static function determineStatus(Promo $promo): string
    {
        if ($promo->started_at === null) {
            return 'draft';
        }

        if ($promo->available_till !== null && $promo->available_till->isPast()) {
            return 'completed';
        }

        if ($promo->moderation_status === PromoModerationStatus::PENDING) {
            return 'moderation';
        }

        if ($promo->moderation_status === PromoModerationStatus::REJECTED) {
            return 'rejected';
        }

        return 'active';
    }
}

