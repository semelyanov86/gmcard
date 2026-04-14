<?php

declare(strict_types=1);

namespace App\Actions\Category;

use App\Data\CategoryData;
use App\Models\Category;
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
        $categories = Category::query()
            ->select(['id', 'name', 'is_starred', 'parent_id', 'description', 'icon_index', 'icon', '_lft', '_rgt'])
            ->get()
            ->toTree();

        return CategoryData::collectFromModels($categories);
    }
}
