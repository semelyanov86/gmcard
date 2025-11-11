<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\PromoType;
use Illuminate\Database\Seeder;

class PromoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'code' => 'simple',
                'name' => 'Простая акция',
                'description' => 'Обычная скидка на товары или услуги',
                'sort_order' => 1,
            ],
            [
                'code' => 'coupon',
                'name' => 'Купон',
                'description' => 'Купон на скидку с уникальным кодом',
                'sort_order' => 2,
            ],
            [
                'code' => 'gift',
                'name' => 'Подарок',
                'description' => 'Подарок при покупке',
                'sort_order' => 3,
            ],
            [
                'code' => 'one_plus_one',
                'name' => 'Один плюс один',
                'description' => 'При покупке одного товара второй в подарок',
                'sort_order' => 4,
            ],
            [
                'code' => 'two_plus_one',
                'name' => 'Два плюс один',
                'description' => 'При покупке двух товаров третий в подарок',
                'sort_order' => 5,
            ],
            [
                'code' => 'cashback',
                'name' => 'Кэшбэк',
                'description' => 'Возврат части стоимости покупки',
                'sort_order' => 6,
            ],
            [
                'code' => 'konkurs',
                'name' => 'Конкурс',
                'description' => 'Конкурсная акция с призами',
                'sort_order' => 7,
            ],
        ];

        foreach ($types as $type) {
            PromoType::firstOrCreate(
                ['code' => $type['code']],
                $type
            );
        }
    }
}
