<?php

declare(strict_types=1);

namespace App\Enums\Promo;

enum PromoModerationStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case DRAFT = 'draft';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function moderationStatuses(): array
    {
        return [
            self::PENDING->value,
            self::APPROVED->value,
            self::REJECTED->value,
        ];
    }

    public function requiresModeration(): bool
    {
        return $this === self::PENDING;
    }

    public function isFinal(): bool
    {
        return $this === self::APPROVED || $this === self::REJECTED;
    }
}

