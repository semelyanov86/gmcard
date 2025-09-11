<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class SubscriptionData extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $type = null,
        public ?string $status = null,
        public ?string $expires_at = null,
        public ?int $user_id = null,
    ) {}
}
