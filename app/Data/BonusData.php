<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class BonusData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $amount,
        public ?string $code = null,
        public ?string $type = null,
        public ?int $source_id = null,
        public ?int $target_id = null,
    ) {}
}
