<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\PaymentType;
use App\ValueObjects\MoneyValueObject;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

final class PaymentData extends Data
{
    public function __construct(
        public int $userId,
        public MoneyValueObject $amount,
        public PaymentType $type,
        public string $description,
        public ?int $transactionId = null,
        public ?CarbonImmutable $paymentDate = null,
    ) {}
}
