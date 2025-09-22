<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\MoneyValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * @implements CastsAttributes<MoneyValueObject|null, int|null>
 */
final class MoneyValueObjectCast implements CastsAttributes
{
    /**
     * @param  array<string, string>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): ?MoneyValueObject
    {
        if ($value === null) {
            return null;
        }

        if (is_int($value)) {
            $amount = $value;
        } elseif (is_string($value) && is_numeric($value)) {
            $amount = (int) $value;
        } else {
            return null;
        }

        $attr = $attributes['currency'] ?? null;
        $currency = ($attr !== null && $attr !== '') ? (string) $attr : 'RUB';
        /** @var non-empty-string $currency */

        return MoneyValueObject::fromCents($amount, $currency);
    }

    /**
     * @param  int|MoneyValueObject|string|null  $value
     * @param  array<string, string>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): ?int
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof MoneyValueObject) {
            return (int) round($value->toFloat() * 100);
        }

        return is_int($value) ? $value : (is_string($value) && is_numeric($value) ? (int) $value : null);
    }
}
