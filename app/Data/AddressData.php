<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;
use App\ValueObjects\PhoneNumberValueObject;

final class AddressData extends Data
{
    public function __construct(
        public string $name,
        public PhoneNumberValueObject $phone,
        public ?string $open_hours = null,
        public ?PhoneNumberValueObject $phone_secondary = null,
        public ?string $website = null,
        public ?int $id = null,
    ) {}
}
