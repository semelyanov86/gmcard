<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class SubscriptionData extends Data
{
    public function __construct(
        public ?int $id,
        public int $user_id,
        public string $type,
        public string $amount,
        public string $periodicity,
    ) {}
}
