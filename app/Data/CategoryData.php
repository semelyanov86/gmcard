<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class CategoryData extends Data
{
    /**
     * @param CategoryData[]|null $children
     */
    public function __construct(
        public int $id,
        public string $name,
        public bool $is_starred,
        public ?int $parent_id,
        public ?string $description,
        public ?array $children,
    ) {}
}
