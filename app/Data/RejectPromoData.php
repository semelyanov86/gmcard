<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class RejectPromoData extends Data
{
    public function __construct(
        public int $promoId,
        public int $moderatorId,
        public string $rejectionReason,
        public ?string $message = null,
    ) {}
}

