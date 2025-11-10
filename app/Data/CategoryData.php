<?php

declare(strict_types=1);

namespace App\Data;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Data;

final class CategoryData extends Data
{
    /**
     * @param  CategoryData[]|null  $children
     */
    public function __construct(
        public int $id,
        public string $name,
        public bool $is_starred,
        public ?int $parent_id,
        public ?string $description,
        public ?array $children,
    ) {}

    public static function fromModel(Category $category): self
    {
        /** @var Collection<int, Category> $children */
        $children = $category->children;

        return new self(
            id: $category->id,
            name: $category->name,
            is_starred: $category->is_starred,
            parent_id: $category->parent_id,
            description: $category->description,
            children: $children->isNotEmpty()
                ? self::collectFromModels($children)
                : null
        );
    }

    /**
     * @param  Collection<int, Category>  $categories
     * @return CategoryData[]
     */
    public static function collectFromModels(Collection $categories): array
    {
        return $categories->map(
            fn (Category $category) => self::fromModel($category)
        )->all();
    }
}
