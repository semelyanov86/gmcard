<?php

declare(strict_types=1);

namespace App\ValueObjects;

use Money\Currency;
use Money\Money;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

final class MoneyValueObject implements Cast
{
    public function __construct(
        private Money $money
    ) {}

    /**
     * @param string $amount
     * @param string $currency
     * @return self
     */
    public static function fromString(string $amount, string $currency = 'RUB'): self
    {
        // Конвертируем строку в копейки (умножаем на 100)
        $amountInMinorUnits = (int) round((float) $amount * 100);

        return new self(
            new Money($amountInMinorUnits, new Currency($currency))
        );
    }

    public static function fromCents(int $cents, string $currency = 'RUB'): self
    {
        return new self(
            new Money($cents, new Currency($currency))
        );
    }

    public function toString(): string
    {
        return (string) ($this->money->getAmount() / 100);
    }

    public function toFloat(): float
    {
        return (float) $this->toString();
    }

    public function getCurrency(): string
    {
        return $this->money->getCurrency()->getCode();
    }

    public function getMoney(): Money
    {
        return $this->money;
    }

    // Реализация Cast интерфейса для Spatie Laravel Data
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof self) {
            return $value;
        }

        if (is_string($value) || is_numeric($value)) {
            return self::fromString((string) $value);
        }

        return null;
    }

    public function __toString(): string
    {
        return (string) $this->toString();
    }
}
