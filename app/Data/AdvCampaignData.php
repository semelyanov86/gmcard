<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class AdvCampaignData extends Data
{
    public function __construct(
        public string $name,
        public string $description,
        public int $crmid,
        /** @var array<string, mixed>|null */
        public ?array $action_details = null,
        public ?string $deeplink = null,
        public ?string $avg_hold_time = null,
        public ?string $avg_money_transfer_time = null,
        public ?int $id = null,
    ) {}
}
