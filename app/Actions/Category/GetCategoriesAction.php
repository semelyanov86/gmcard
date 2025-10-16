<?php

declare(strict_types=1);

namespace App\Actions\Category;

use App\Data\CategoryData;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static CategoryData[] run()
 */
final readonly class GetCategoriesAction
{
    use AsAction;

    /**
     * @return CategoryData[]
     */
    public function handle(): array
    {
        $categories = Category::with('children.children.children')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return $this->mapCategoriesToData($categories);
    }

    /**
     * @param Collection<int, Category> $categories
     * @return CategoryData[]
     */
    private function mapCategoriesToData(Collection $categories): array
    {
        return $categories->map(
            fn (Category $category) => $this->mapCategoryToData($category)
        )->all();
    }

    private function mapCategoryToData(Category $category): CategoryData
    {
        return new CategoryData(
            id: $category->id,
            name: $category->name,
            is_starred: $category->is_starred,
            parent_id: $category->parent_id,
            description: $category->description,
            children: $category->children->isNotEmpty()
                ? $this->mapCategoriesToData($category->children)
                : null
        );
    }
}

