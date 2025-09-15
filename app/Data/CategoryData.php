<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class CategoryData extends Data
{
    public function __construct(
        public string $name,
        public int $parent_id,
        public bool $is_starred = false,
        public ?string $description = null,
        public ?int $id = null,
    ) {}
}
