<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\SubscriptionType;
use Spatie\LaravelData\Data;

final class SubscriptionData extends Data
{
    public function __construct(
        public int $user_id,
        public SubscriptionType $type,
        public string $amount,
        public string $periodicity,
        public ?int $id = null,
    ) {}
}
