<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class PaymentData extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $payment_date = null,
        public string $amount,
        public ?string $type = null,
        public ?string $currency = null,
        public ?string $description = null,
        public ?string $transaction_id = null,
        public ?int $user_id = null,
    ) {}
}
