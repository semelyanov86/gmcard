<?php

namespace App\Data;

use App\Models\Organisation;
use Spatie\LaravelData\Data;

class OrganisationData extends Data
{
	public function __construct(
		public ?int $id,
		public string $name,
		public ?string $owner_role,
		public ?string $inn,
		public ?string $ogrn,
		public ?string $contact,
		public ?string $contact_fio,
		public ?array $opening_hours,
		public ?int $user_id,
		public ?int $address_id,
	)
	{}
}
