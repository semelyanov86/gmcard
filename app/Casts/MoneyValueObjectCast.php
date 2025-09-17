<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\MoneyValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

final class MoneyValueObjectCast implements CastsAttributes
{
	public function get(Model $model, string $key, mixed $value, array $attributes): ?MoneyValueObject
	{
		if ($value === null) {
			return null;
		}

		return MoneyValueObject::fromCents((int) $value, $attributes['currency'] ?? 'RUB');
	}

	public function set(Model $model, string $key, mixed $value, array $attributes): ?int
	{
		if ($value === null) {
			return null;
		}

		if ($value instanceof MoneyValueObject) {
			return (int) round($value->toFloat() * 100);
		}

		return (int) $value;
	}
}
