<?php

namespace App\Data;

use App\Models\Subscription;
use Spatie\LaravelData\Data;

class SubscriptionData extends Data
{
	public function __construct(
		public ?int $id,
		public ?string $type,
		public ?string $status,
		public ?string $expires_at,
		public ?int $user_id,
	)
	{}
}
