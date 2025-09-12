<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class CityData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $country,
    ) {}
}
