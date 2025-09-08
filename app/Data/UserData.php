<?php

namespace App\Data;

use App\Models\User;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithoutValidation;

class UserData extends Data
{
	public function __construct(
		public ?int $id,
		public string $name,
		public ?string $last_name,
		public ?int $age,
		public string $email,
		public ?string $job,
		public ?string $job_status,
		public ?string $city,
		public ?string $country,
		public ?string $birth_date,
		public ?string $role,
		public ?string $gender,
		public ?string $code,
	)
	{}
}
