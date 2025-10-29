<?php

declare(strict_types=1);

namespace App\Casts;

use App\Data\CreatePromoData;
use App\ValueObjects\MoneyValueObject;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

final class MoneyValueObjectDataCast implements Cast
{
    /**
     * @param  array<string, string>  $properties
     * @param  CreationContext<CreatePromoData>  $context
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): ?MoneyValueObject
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof MoneyValueObject) {
            return $value;
        }

        if (is_array($value) && array_key_exists('amount', $value)) {
            $amount = $value['amount'];
            $currency = $value['currency'] ?? 'RUB';

            if ($amount === null || $amount === '') {
                return null;
            }

            if (! is_numeric($amount)) {
                return null;
            }

            $normalizedCurrency = match ($currency) {
                '%' => 'PCT',
                '₽', 'руб' => 'RUB',
                default => 'RUB',
            };
            /** @var non-empty-string $normalizedCurrency */

            return MoneyValueObject::fromString((string) $amount, $normalizedCurrency);
        }

        if (is_string($value) || is_numeric($value)) {
            return MoneyValueObject::fromString((string) $value);
        }

        return null;
    }
}
