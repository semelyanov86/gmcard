<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class PaymentData extends Data
{
    public function __construct(
        public ?int $id,
        public string $payment_date,
        public string $amount,
        public string $type,
        public string $currency,
        public string $description,
        public ?string $transaction_id,
        public int $user_id,
    ) {}
}
