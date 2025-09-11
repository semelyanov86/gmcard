<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class BonusData extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $amount = null,
        public ?int $code = null,
        public ?string $type = null,
        public ?int $source_id = null,
        public ?int $target_id = null,
    ) {}
}
