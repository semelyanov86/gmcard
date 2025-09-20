<?php

declare(strict_types=1);

namespace Database\Seeders\Base;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Рестораны', 'description' => 'Скидки и акции в ресторанах', 'parent_id' => null, 'is_starred' => true],
            ['name' => 'Кафе', 'description' => 'Кофейни и кафе рядом', 'parent_id' => null, 'is_starred' => false],
            ['name' => 'Супермаркеты', 'description' => 'Продукты и товары повседневные', 'parent_id' => null, 'is_starred' => false],
            ['name' => 'Электроника', 'description' => 'Гаджеты и техника', 'parent_id' => null, 'is_starred' => false],
            ['name' => 'Одежда', 'description' => 'Мода и стиль', 'parent_id' => null, 'is_starred' => false],
            ['name' => 'Красота', 'description' => 'Салоны, уход и косметика', 'parent_id' => null, 'is_starred' => false],
            ['name' => 'Спорт', 'description' => 'Фитнес и спорттовары', 'parent_id' => null, 'is_starred' => false],
            ['name' => 'Путешествия', 'description' => 'Отели и перелёты', 'parent_id' => null, 'is_starred' => false],
            ['name' => 'Аптеки', 'description' => 'Здоровье и лекарства', 'parent_id' => null, 'is_starred' => false],
            ['name' => 'Такси', 'description' => 'Поездки и каршеринг', 'parent_id' => null, 'is_starred' => false],
        ];

        foreach ($categories as $data) {
            Category::query()->create($data);
        }
    }
}
