<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\PromoTypeSizeEnum;
use Spatie\LaravelData\Data;

final class PromoTypeData extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public PromoTypeSizeEnum $size,
    ) {}
}
