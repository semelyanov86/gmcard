<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\MoneyValueObject;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

final class MoneyValueObjectDataCast implements Cast
{
    /** @phpstan-ignore-next-line */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): ?MoneyValueObject
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof MoneyValueObject) {
            return $value;
        }

        if (is_array($value) && isset($value['amount'])) {
            $amount = $value['amount'];
            $currency = $value['currency'] ?? 'RUB';

            if ($amount === null || $amount === '') {
                return null;
            }

            if (! is_numeric($amount)) {
                return null;
            }

            $currency = match ($currency) {
                '%' => 'PCT',
                '₽', 'руб' => 'RUB',
                default => $currency,
            };

            return MoneyValueObject::fromString((string) $amount, $currency);
        }

        if (is_string($value) || is_numeric($value)) {
            return MoneyValueObject::fromString((string) $value);
        }

        return null;
    }
}
