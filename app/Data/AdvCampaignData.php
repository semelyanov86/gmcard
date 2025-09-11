<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class AdvCampaignData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $name,
        public ?string $description = null,
        public ?int $crmid = null,
        /** @var array<string, mixed>|null */
        public ?array $action_details = null,
        public ?string $deeplink = null,
        public ?int $avg_hold_time = null,
        public ?int $avg_money_transfer_time = null,
    ) {}
}
