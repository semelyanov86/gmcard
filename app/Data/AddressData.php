<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class AddressData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $name,
        public ?string $open_hours = null,
        public ?string $phone = null,
        public ?string $phone_secondary = null,
        public ?string $website = null,
    ) {}
}
