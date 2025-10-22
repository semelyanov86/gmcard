<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class CreatePromoData extends Data
{
    public function __construct(
        public int $promo_type_id,
        public string $title,
        public string $description,
        public int $duration_days,
        public bool $agree_to_terms,
        /** @var string[] */
        public array $category_ids,
        public ?string $conditions = null,
        public ?string $discount_amount = null,
        public ?string $discount_currency = null,
        public ?string $cashback_amount = null,
        public ?string $cashback_currency = null,
        public ?string $minimum_order_amount = null,
        public ?string $promo_code = null,
        public ?bool $free_delivery = false,
        public ?bool $show_in_banner = false,
        /** @var int[]|null */
        public ?array $city_ids = null,
        public ?string $youtube_url = null,
        /** @var array<string, mixed>|null */
        public ?array $social_links = null,
        /** @var array<string, mixed>|null */
        public ?array $schedule = null,
        /** @var array<int, mixed>|null */
        public ?array $addresses = null,
        /** @var array<int, \Illuminate\Http\UploadedFile>|null */
        public ?array $photos = null,
        public ?bool $is_draft = false,
    ) {}
}
