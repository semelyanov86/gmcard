<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\PhoneNumberValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * @implements CastsAttributes<PhoneNumberValueObject|null, string|null>
 */
final class PhoneNumberCast implements CastsAttributes
{
	/**
	 * @param array<string, string> $attributes
	 */
	public function get(Model $model, string $key, mixed $value, array $attributes): ?PhoneNumberValueObject
	{
		if ($value === null || $value === '') {
			return null;
		}

		if (is_string($value)) {
			return PhoneNumberValueObject::from($value);
		}

		return null;
	}

	/**
	 * @param PhoneNumberValueObject|string|null $value
	 * @param array<string, string> $attributes
	 */
	public function set(Model $model, string $key, mixed $value, array $attributes): ?string
	{
		if ($value instanceof PhoneNumberValueObject) {
			return $value->toE164();
		}

		if (is_string($value)) {
			return $value !== '' ? $value : null;
		}

		return null;
	}
}
