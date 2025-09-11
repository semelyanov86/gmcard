<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class PromoUsageData extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $used_at = null,
        public ?string $status = null,
        public ?int $user_id = null,
        public ?int $promo_id = null,
    ) {}
}
