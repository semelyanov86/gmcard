<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class PopUpData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public ?string $phone,
        public ?string $city,
        public bool $agree,
    ) {}
}
