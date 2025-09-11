<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class CategoryData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $name,
        public ?string $description = null,
        public int $parent_id,
        public bool $is_starred,
    ) {}
}
