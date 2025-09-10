<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class PromoData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public ?string $type,
        public ?string $code,
        public ?string $img,
        public ?int $amount,
        public ?string $description,
        public ?array $extra_conditions,
        public ?string $video_link,
        public ?array $smm_links,
        public ?array $days_availability,
        public ?string $availabe_from,
        public ?string $available_to,
        public ?string $started_at,
        public ?string $available_till,
        public bool $show_on_home,
        public ?int $raise_on_top_hours,
        public ?int $restart_after_finish_days,
        public ?int $sales_order_from,
        public ?int $free_delivery_from,
        public bool $free_delivery,
        public ?string $approved_at,
        public ?string $approving_notes,
        public ?int $crmid,
        public ?int $adv_campaign_id,
        public ?int $organisation_id,
        public ?int $dicsount,
    ) {}
}
