<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Category;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static void run(array $namesPath)
 */
final readonly class CategoryPathAction
{
    use AsAction;

    /**
     * @param  list<string>  $namesPath
     */
    public function handle(array $namesPath): void
    {
        $parentId = null;

        foreach ($namesPath as $name) {
            $category = Category::query()
                ->where('name', $name)
                ->when($parentId !== null, fn ($q) => $q->where('parent_id', $parentId))
                ->when($parentId === null, fn ($q) => $q->whereNull('parent_id'))
                ->first();

            if (! $category) {
                $category = new Category(['name' => $name]);
                $category->parent_id = $parentId;
                $category->save();
            }

            $parentId = $category->id;
        }
    }
}
