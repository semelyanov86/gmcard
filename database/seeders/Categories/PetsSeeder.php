<?php

declare(strict_types=1);

namespace Database\Seeders\Categories;

use App\Actions\CategoryPathAction;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PetsSeeder extends Seeder
{
    public function run(): void
    {
        $paths = [
            ['Зоотовары', 'Корма', 'Для собак'],
            ['Зоотовары', 'Корма', 'Для кошек'],
            ['Зоотовары', 'Корма', 'Для грызунов и птиц'],
            ['Зоотовары', 'Корма', 'Для рыб'],
            ['Зоотовары', 'Корма', 'Лакомства'],
            ['Зоотовары', 'Аксессуары', 'Переноски и клетки'],
            ['Зоотовары', 'Аксессуары', 'Миски и поилки'],
            ['Зоотовары', 'Аксессуары', 'Ошейники и поводки'],
            ['Зоотовары', 'Аксессуары', 'Лежанки и домики'],
            ['Зоотовары', 'Аксессуары', 'Игрушки'],
            ['Зоотовары', 'Аксессуары', 'Одежда для питомцев'],
            ['Зоотовары', 'Гигиена и уход', 'Шампуни и косметика'],
            ['Зоотовары', 'Гигиена и уход', 'Лотки и наполнители'],
            ['Зоотовары', 'Гигиена и уход', 'Когтеточки'],
            ['Зоотовары', 'Гигиена и уход', 'Средства от паразитов'],
            ['Зоотовары', 'Гигиена и уход', 'Расчески и щетки'],
            ['Зоотовары', 'Аквариумистика', 'Оборудование'],
            ['Зоотовары', 'Аквариумистика', 'Корма'],
            ['Зоотовары', 'Аквариумистика', 'Декорации'],
            ['Зоотовары', 'Ветеринария', 'Витамины'],
            ['Зоотовары', 'Ветеринария', 'Лекарства'],
            ['Зоотовары', 'Ветеринария', 'Средства ухода'],
        ];

        foreach ($paths as $path) {
            CategoryPathAction::run($path);
        }

        $petsRootCategory = Category::query()
            ->where('name', 'Зоотовары')
            ->whereNull('parent_id')
            ->first();

        if (! $petsRootCategory) {
            return;
        }

        $iconIndexByCategoryName = [
            'Корма' => 1,
            'Аксессуары' => 2,
            'Гигиена и уход' => 3,
            'Аквариумистика' => 4,
            'Ветеринария' => 5,
        ];

        foreach ($iconIndexByCategoryName as $categoryName => $iconIndex) {
            Category::query()
                ->where('parent_id', $petsRootCategory->id)
                ->where('name', $categoryName)
                ->update([
                    'icon_index' => $iconIndex,
                    'icon' => "/images/zoo/{$iconIndex}.png",
                ]);
        }
    }
}
