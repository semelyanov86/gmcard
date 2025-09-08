<?php

namespace App\Data;

use App\Models\Address;
use Spatie\LaravelData\Data;

class AddressData extends Data
{
	public function __construct(
		public ?int $id,
		public string $name,
		public ?string $open_hours,
		public ?string $phone,
		public ?string $phone_secondary,
		public ?string $website,
	)
	{}
}
