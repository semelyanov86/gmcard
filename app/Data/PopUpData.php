<?php

declare(strict_types=1);

namespace App\Data;

use App\ValueObjects\PhoneNumberValueObject;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\WithCast;
use App\Data\Casts\PhoneNumberDataCast;

final class PopUpData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public bool $agree,
        #[WithCast(PhoneNumberDataCast::class)]
        public ?PhoneNumberValueObject $phone = null,
        public ?string $city = null,
    ) {}
}
