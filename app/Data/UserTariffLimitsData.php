<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class UserTariffLimitsData extends Data
{
    public function __construct(
        public int $activePromosCount,
        public bool $canCreateFreeAd,
        public bool $isNextAdFirstFree,
        public int $tariffAdsLimit,
    ) {}
}


