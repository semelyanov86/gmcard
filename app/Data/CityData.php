<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class CityData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public ?string $region,
        public ?string $country,
    ) {}
}
