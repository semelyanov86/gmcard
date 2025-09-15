<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class PromoUsageData extends Data
{
    public function __construct(
        public string $used_at,
        public ?int $id = null,
        public int $promo_id,
        public ?int $user_id = null,
        public ?string $ip = null,
    ) {}
}
