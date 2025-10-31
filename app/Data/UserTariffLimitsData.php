<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class UserTariffLimitsData extends Data
{
    public function __construct(
        public int $activePromos,
        public bool $hasFreeSlot,
        public bool $firstAdFree,
        public int $adsLimit,
    ) {}
}


