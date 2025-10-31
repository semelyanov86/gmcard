<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;
use App\Enums\Promo\PromoCostType;

final class PromoCostData extends Data
{
    public function __construct(
        public int $dailyCost,
        public bool $isFree,
        public PromoCostType $type,
        public int $durationDays,
        public int $totalCost,
    ) {}
}
