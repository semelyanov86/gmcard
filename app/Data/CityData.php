<?php

namespace App\Data;

use App\Models\City;
use Spatie\LaravelData\Data;

class CityData extends Data
{
	public function __construct(
		public ?int $id,
		public string $name,
		public ?string $region,
		public ?string $country,
	)
	{}
}
