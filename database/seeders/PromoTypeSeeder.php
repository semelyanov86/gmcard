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
                'icon' => 'promo-types/simple.png',
            ],
            [
                'code' => 'coupon',
                'name' => 'Купон',
                'description' => 'Купон на скидку с уникальным кодом',
                'sort_order' => 2,
                'icon' => 'promo-types/coupon.png',
            ],
            [
                'code' => 'gift',
                'name' => 'Подарок',
                'description' => 'Подарок при покупке',
                'sort_order' => 3,
                'icon' => 'promo-types/gift.png',
            ],
            [
                'code' => 'one_plus_one',
                'name' => 'Один плюс один',
                'description' => 'При покупке одного товара второй в подарок',
                'sort_order' => 4,
                'icon' => 'promo-types/one_plus_one.png',
            ],
            [
                'code' => 'two_plus_one',
                'name' => 'Два плюс один',
                'description' => 'При покупке двух товаров третий в подарок',
                'sort_order' => 5,
                'icon' => 'promo-types/two_plus_one.png',
            ],
            [
                'code' => 'cashback',
                'name' => 'Кэшбэк',
                'description' => 'Возврат части стоимости покупки',
                'sort_order' => 6,
                'icon' => 'promo-types/cashback.png',
            ],
            [
                'code' => 'konkurs',
                'name' => 'Конкурс',
                'description' => 'Конкурсная акция с призами',
                'sort_order' => 7,
                'icon' => 'promo-types/konkurs.png',
            ],
        ];

        foreach ($types as $type) {
            PromoType::updateOrCreate(
                ['code' => $type['code']],
                $type
            );
        }
    }
}
