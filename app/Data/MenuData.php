<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class MenuData extends Data
{
    public function __construct(
        public int $id,
        public string $label,
        public string $url,
        public string $type,
        public int $order,
        public bool $is_active,
    ) {}
}

