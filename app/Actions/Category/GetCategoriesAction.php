<?php

declare(strict_types=1);

namespace App\Actions\Category;

use App\Data\CategoryData;
use App\Models\Category;
use Kalnoy\Nestedset\Collection as NestedSetCollection;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static CategoryData[] run()
 */
final readonly class GetCategoriesAction
{
    use AsAction;

    /**
     * @return array<int, CategoryData>
     */
    public function handle(): array
    {
        /** @var NestedSetCollection<int, Category> $treeableCategories */
        $treeableCategories = Category::query()
            ->select(['id', 'name', 'is_starred', 'parent_id', 'description', 'icon_index', 'icon', '_lft', '_rgt'])
            ->get();

        $categories = $treeableCategories->toTree();
        /** @var array<int, Category> $categoriesArray */
        $categoriesArray = $categories->all();

        return CategoryData::collectFromModels($categoriesArray);
    }
}
