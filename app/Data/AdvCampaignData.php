<?php

namespace App\Data;

use App\Models\AdvCampaign;
use Spatie\LaravelData\Data;

class AdvCampaignData extends Data
{
	public function __construct(
		public ?int $id,
		public string $name,
		public ?string $description,
		public ?int $crmid,
		public ?array $action_details,
		public ?string $deeplink,
		public ?int $avg_hold_time,
		public ?int $avg_money_transfer_time,
	)
	{}
}
