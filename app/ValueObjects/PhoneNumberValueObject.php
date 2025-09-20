<?php

declare(strict_types=1);

namespace App\ValueObjects;

use Brick\PhoneNumber\PhoneNumber;
use Brick\PhoneNumber\PhoneNumberFormat;
use Brick\PhoneNumber\PhoneNumberParseException;
use Stringable;

final readonly class PhoneNumberValueObject implements Stringable
{
    public function __construct(
        protected ?PhoneNumber $phone
    ) {}

    public static function from(?string $value, string $region = 'RU'): ?self
    {
        if (! $value) {
            return null;
        }

        try {
            return new self(PhoneNumber::parse($value, $region));
        } catch (PhoneNumberParseException) {
            return null;
        }
    }

    public function toE164(): ?string
    {
        return $this->phone?->format(PhoneNumberFormat::E164);
    }

    public function toDisplayValue(): ?string
    {
        return $this->phone?->format(PhoneNumberFormat::NATIONAL);
    }

    public function __toString(): string
    {
        return $this->toE164() ?? '';
    }
}
