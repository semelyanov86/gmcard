<?php

declare(strict_types=1);

namespace App\Data\Casts;

use App\ValueObjects\PhoneNumberValueObject;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Casts\CastableData;
use Spatie\LaravelData\Casts\Uncastable;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

final class PhoneNumberDataCast implements Cast
{
	public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): PhoneNumberValueObject|null|Uncastable
	{
		if ($value === null || $value === '') {
			return null;
		}

		if (is_string($value)) {
			return PhoneNumberValueObject::from($value);
		}

		return Uncastable::create();
	}
} 