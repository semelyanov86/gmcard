<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use App\Models\PromoType;
use Illuminate\Database\Eloquent\Relations\Relation;
use Spatie\LaravelData\Data;
use Closure;

final class PromoListItemData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public ?string $img,
        public string $status,
        public ?int $salesOrderFrom,
        public ?string $extraConditions,
        public ?string $type,
        public ?string $discount,
        public ?int $promoTypeId,
        public ?string $promoTypeIcon,
        public ?string $startedAt,
        public ?string $availableTill,
        public ?string $code,
        public ?string $rejectionReason = null,
        public ?string $rejectionMessage = null,
        /** @var list<string>|null */
        public ?array $photos = null,
    ) {}

    public static function fromModel(Promo $promo): self
    {
        return self::fromPromo($promo);
    }

    /**
     * @return array<int|string, string|Closure(Relation): void>
     */
    // @phpstan-ignore missingType.generics
    public static function eagerLoadForListItem(): array
    {
        return [
            'promoType',
            'photos' => static function (Relation $query): void {
                $query->orderBy('sort_order');
            },
        ];
    }

    public static function fromPromo(Promo $promo): self
    {
        $promo->loadMissing(self::eagerLoadForListItem());

        $status = self::determineStatus($promo);

        /** @var list<string> $photoPaths */
        $photoPaths = $promo->photos
            ->pluck('path')
            ->filter()
            ->values()
            ->all();

        /** @var list<string>|null $photos */
        $photos = $photoPaths === [] ? null : $photoPaths;

        $resolvedPromoType = $promo->promoType;
        if ($resolvedPromoType === null) {
            $resolvedPromoType = PromoType::query()
                ->where('name', $promo->type->value)
                ->first();
        }

        $iconPath = $resolvedPromoType?->icon;
        $promoTypeIcon = $iconPath !== null ? '/storage/' . mb_ltrim($iconPath, '/') : null;

        return new self(
            id: $promo->id,
            name: $promo->name,
            description: $promo->description,
            img: $promo->img,
            status: $status,
            salesOrderFrom: $promo->sales_order_from ? (int) round($promo->sales_order_from->toFloat()) : null,
            extraConditions: $promo->extra_conditions,
            type: $promo->type->value,
            discount: $promo->discount,
            promoTypeId: $promo->promo_type_id ?? $resolvedPromoType?->id,
            promoTypeIcon: $promoTypeIcon,
            startedAt: $promo->started_at?->toIso8601String(),
            availableTill: $promo->available_till?->toIso8601String(),
            code: $promo->code,
            rejectionReason: $promo->rejection_reason,
            rejectionMessage: $promo->rejection_message,
            photos: $photos,
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
