<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;
final class PromoCostData extends Data
{
    public function __construct(
        public int $dailyCost,
        public bool $isFree,
        public string $reason,
        public int $durationDays,
        public int $totalCost,
    ) {}
}


