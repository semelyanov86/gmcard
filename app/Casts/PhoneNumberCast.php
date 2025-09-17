<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\PhoneNumberValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

final class PhoneNumberCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): ?PhoneNumberValueObject
    {
        if (! $value) {
            return null;
        }

        if ($value instanceof PhoneNumberValueObject) {
            return $value;
        }

        return PhoneNumberValueObject::from((string) $value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        if ($value instanceof PhoneNumberValueObject) {
            return $value->toE164();
        }

        return $value ? (string) $value : null;
    }
}
