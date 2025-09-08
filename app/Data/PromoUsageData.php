<?php

namespace App\Data;

use App\Models\PromoUsage;
use Spatie\LaravelData\Data;

class PromoUsageData extends Data
{
	public function __construct(
		public ?int $id,
		public ?string $used_at,
		public ?string $status,
		public ?int $user_id,
		public ?int $promo_id,
	)
	{}
}
