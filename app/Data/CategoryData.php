<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class CategoryData extends Data
{
    public function __construct(
        public string $name,
        public bool $is_starred,
        public ?int $parent_id,
        public ?string $description = null,
        public ?int $id = null,
    ) {}
}
