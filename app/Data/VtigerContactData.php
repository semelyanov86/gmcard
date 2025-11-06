<?php

declare(strict_types=1);

namespace App\Data;

use App\ValueObjects\PhoneNumberValueObject;
use Spatie\LaravelData\Data;

final class VtigerContactData extends Data
{
    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $email,
        public ?PhoneNumberValueObject $phone = null,
        public ?string $city = null,
        public ?string $country = null,
        public ?string $leadsource = null,
        public ?string $assigned_user_id = null,
    ) {}
}

