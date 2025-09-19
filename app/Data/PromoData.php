<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\PromoType;
use Spatie\LaravelData\Data;

final class PromoData extends Data
{
    public function __construct(
        public string $name,
        public int $user_id,
        public PromoType $type,
        public string $description,
        public string $extra_conditions,
        public bool $show_on_home,
        public int $raise_on_top_hours,
        public int $restart_after_finish_days,
        public int $sales_order_from,
        public int $free_delivery_from,
        public bool $free_delivery,
        public ?string $video_link,
        /** @var array<string, string>|null */
        public ?array $smm_links,
        /** @var string[]|null */
        public ?array $days_availability,
        public ?string $availabe_from,
        public ?string $available_to,
        public ?string $started_at,
        public string $available_till,
        public ?int $id = null,
        public ?string $approved_at = null,
        public ?string $approving_notes = null,
        public ?string $crmid = null,
        public ?int $adv_campaign_id = null,
        public ?int $organisation_id = null,
        public ?string $discount = null,
        public ?string $code = null,
        public ?string $img = null,
        public ?int $amount = null,
    ) {}
}
