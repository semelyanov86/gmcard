<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class PromoData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $name,
        public ?string $type = null,
        public ?string $code = null,
        public ?string $img = null,
        public ?int $amount = null,
        public ?string $description = null,
        /** @var array<string, mixed>|null */
        public ?array $extra_conditions = null,
        public ?string $video_link = null,
        /** @var array<string, mixed>|null */
        public ?array $smm_links = null,
        /** @var array<string, mixed>|null */
        public ?array $days_availability = null,
        public ?string $availabe_from = null,
        public ?string $available_to = null,
        public ?string $started_at = null,
        public ?string $available_till = null,
        public bool $show_on_home,
        public ?int $raise_on_top_hours = null,
        public ?int $restart_after_finish_days = null,
        public ?int $sales_order_from = null,
        public ?int $free_delivery_from = null,
        public bool $free_delivery,
        public ?string $approved_at = null,
        public ?string $approving_notes = null,
        public ?int $crmid = null,
        public ?int $adv_campaign_id = null,
        public ?int $organisation_id = null,
        public ?int $dicsount = null,
    ) {}
}
