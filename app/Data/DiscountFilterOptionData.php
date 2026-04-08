<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class DiscountFilterOptionData extends Data
{
    public function __construct(
        public int $id,
        public int $minPercent,
    ) {}
}
