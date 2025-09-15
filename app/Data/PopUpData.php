<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class PopUpData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public bool $agree,
        public ?string $phone = null,
        public ?string $city = null,
    ) {}
}
