<?php

declare(strict_types=1);

namespace Database\Seeders\Categories;

use App\Actions\CategoryPathAction;
use App\Models\Category;
use Illuminate\Database\Seeder;

class FashionSeeder extends Seeder
{
    public function run(): void
    {
        $paths = [
            ['Мода и стиль', 'Мужская одежда', 'Верхняя одежда'],
            ['Мода и стиль', 'Мужская одежда', 'Повседневная одежда'],
            ['Мода и стиль', 'Мужская одежда', 'Спортивная одежда'],
            ['Мода и стиль', 'Мужская одежда', 'Белье и носки'],
            ['Мода и стиль', 'Женская одежда', 'Верхняя одежда'],
            ['Мода и стиль', 'Женская одежда', 'Повседневная одежда'],
            ['Мода и стиль', 'Женская одежда', 'Спортивная одежда'],
            ['Мода и стиль', 'Женская одежда', 'Белье и колготки'],
            ['Мода и стиль', 'Обувь', 'Мужская'],
            ['Мода и стиль', 'Обувь', 'Женская'],
            ['Мода и стиль', 'Обувь', 'Спортивная'],
            ['Мода и стиль', 'Аксессуары', 'Сумки и рюкзаки'],
            ['Мода и стиль', 'Аксессуары', 'Головные уборы'],
            ['Мода и стиль', 'Аксессуары', 'Украшения и часы'],
            ['Мода и стиль', 'Аксессуары', 'Прочие аксессуары'],
            ['Мода и стиль', 'Спецкатегории', 'Большие размеры'],
            ['Мода и стиль', 'Спецкатегории', 'Винтаж/секонд-хенд'],
            ['Мода и стиль', 'Спецкатегории', 'Устойчивая мода'],
        ];

        foreach ($paths as $path) {
            CategoryPathAction::run($path);
        }

        $fashionRootCategory = Category::query()
            ->where('name', 'Мода и стиль')
            ->whereNull('parent_id')
            ->first();

        if (! $fashionRootCategory) {
            return;
        }

        $iconDataByCategoryName = [
            'Мужская одежда' => ['icon_index' => 1, 'icon_name' => 'mens-clothing'],
            'Женская одежда' => ['icon_index' => 2, 'icon_name' => 'womens-clothing'],
            'Обувь' => ['icon_index' => 3, 'icon_name' => 'shoes'],
            'Аксессуары' => ['icon_index' => 4, 'icon_name' => 'accessories'],
            'Спецкатегории' => ['icon_index' => 5, 'icon_name' => 'special-categories'],
        ];

        foreach ($iconDataByCategoryName as $categoryName => $iconData) {
            Category::query()
                ->where('parent_id', $fashionRootCategory->id)
                ->where('name', $categoryName)
                ->update([
                    'icon_index' => $iconData['icon_index'],
                    'icon' => "/images/fashion/{$iconData['icon_index']}.png",
                ]);
        }
    }
}
