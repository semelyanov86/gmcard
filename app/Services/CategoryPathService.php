<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;

class CategoryPathService
{
    public function ensurePath(array $namesPath): void
    {
        $parentId = null;

        foreach ($namesPath as $name) {
            $category = Category::query()
                ->where('name', $name)
                ->when($parentId !== null, fn ($q) => $q->where('parent_id', $parentId))
                ->when($parentId === null, fn ($q) => $q->whereNull('parent_id'))
                ->first();

            if (!$category) {
                $category = new Category(['name' => $name]);
                $category->parent_id = $parentId;
                $category->save();
            }

            $parentId = $category->getKey();
        }
    }
} 
