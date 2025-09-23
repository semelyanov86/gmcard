<?php

declare(strict_types=1);

namespace Database\Seeders\Base;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Ensure idempotent seeding by clearing existing categories (optional depending on env)
        // Category::query()->truncate();

        // Build the specified 4-level hierarchy under "Спорт и активный отдых"
        $root = Category::query()->firstOrCreate([
            'name' => 'Спорт и активный отдых',
        ], [
            'description' => null,
            'parent_id' => null,
            'is_starred' => false,
        ]);

        $inventory = Category::query()->firstOrCreate([
            'name' => 'Спортивный инвентарь',
            'parent_id' => $root->id,
        ], [
            'description' => null,
            'is_starred' => false,
        ]);

        // Level 3 groups
        $groups = [
            'Командные виды' => [
                'Футбол',
                'Баскетбол',
                'Волейбол',
                'Хоккей',
            ],
            'Фитнес' => [
                'Тренажеры',
                'Свободные веса',
                'Функциональный тренинг',
            ],
            'Зимние виды' => [
                'Лыжи и сноуборды',
                'Коньки',
                'Санки и снегокаты',
            ],
            'Водные виды' => [
                'Плавание',
            ],
        ];

        foreach ($groups as $groupName => $children) {
            $group = Category::query()->firstOrCreate([
                'name' => $groupName,
                'parent_id' => $inventory->id,
            ], [
                'description' => null,
                'is_starred' => false,
            ]);

            foreach ($children as $leafName) {
                Category::query()->firstOrCreate([
                    'name' => $leafName,
                    'parent_id' => $group->id,
                ], [
                    'description' => null,
                    'is_starred' => false,
                ]);
            }
        }
    }
}
