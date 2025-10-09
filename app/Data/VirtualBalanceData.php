<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\PaymentType;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

final class VirtualBalanceData extends Data
{
    public function __construct(
        public int $user_id,
        public CarbonImmutable $compensation_date,
        public int $amount,
        public PaymentType $type,
        public ?string $description = null,
        public ?int $id = null,
    ) {}
}
