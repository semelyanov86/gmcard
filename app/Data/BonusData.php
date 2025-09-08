<?php

namespace App\Data;

use App\Models\Bonus;
use Spatie\LaravelData\Data;

class BonusData extends Data
{
	public function __construct(
		public ?int $id,
		public string $amount,
		public ?string $code,
		public ?string $type,
		public ?int $source_id,
		public ?int $target_id,
	)
	{}
}
