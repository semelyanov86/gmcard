<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class PromoUsageData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $used_at,
        public ?int $user_id = null,
        public int $promo_id,
        public ?string $ip = null,
    ) {}
}
