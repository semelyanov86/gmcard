<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\PaymentType;
use App\ValueObjects\MoneyValueObject;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

final class PaymentData extends Data
{
    public function __construct(
        public int $user_id,
        public Carbon $payment_date,
        public MoneyValueObject $amount,
        public PaymentType $type,
        public string $description,
        public ?string $transaction_id = null,
        public ?int $id = null,
    ) {}
}
