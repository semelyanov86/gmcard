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
        $categories = Category::get()->toTree();

        return CategoryData::collectFromModels($categories);
    }
}
