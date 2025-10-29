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
     * @return CategoryData[]
     */
    public function handle(): array
    {
        $categories = Category::with('children.children.children')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return CategoryData::collectFromModels($categories);
    }
}
