<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\UrlValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * @implements CastsAttributes<UrlValueObject|null, string|null>
 */
final class UrlValueObjectCast implements CastsAttributes
{
    /**
     * @param  string|null  $value
     * @param  array<string, string>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): ?UrlValueObject
    {
        if ($value === null || $value === '') {
            return null;
        }

        return UrlValueObject::from($value);
    }

    /**
     * @param  UrlValueObject|string|null  $value
     * @param  array<string, string>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        if ($value instanceof UrlValueObject) {
            return (string) $value;
        }

        if (is_string($value)) {
            return $value !== '' ? $value : null;
        }

        return null;
    }
}
