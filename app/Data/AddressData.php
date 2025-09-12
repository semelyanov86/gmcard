<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class AddressData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public ?string $open_hours,
        public string $phone,
        public ?string $phone_secondary = null,
        public ?string $website = null,
    ) {}
}
