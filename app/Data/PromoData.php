<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class PromoData extends Data
{
    public function __construct(
        public string $name,
        public int $user_id,
        public string $type,
        public string $description,
        public string $extra_conditions,
        public bool $show_on_home,
        public int $raise_on_top_hours,
        public int $restart_after_finish_days,
        public int $sales_order_from,
        public int $free_delivery_from,
        public bool $free_delivery,
        public ?string $video_link = null,
        /** @var array<string, mixed>|null */
        public ?array $smm_links = null,
        /** @var array<string, mixed>|null */
        public ?array $days_availability = null,
        public ?string $availabe_from = null,
        public ?string $available_to= null,
        public ?string $started_at = null,
        public string $available_till,
        public ?int $id = null,
        public ?string $approved_at = null,
        public ?string $approving_notes = null,
        public ?int $crmid = null,
        public ?int $adv_campaign_id = null,
        public ?int $organisation_id = null,
        public ?string $dicsount = null,
        public ?string $code = null,
        public ?string $img = null,
        public ?int $amount = null,
    ) {}
}
