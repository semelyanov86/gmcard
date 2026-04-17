<?php

declare(strict_types=1);

namespace Database\Seeders\Promo;

use App\Models\PromoActionButton;
use Illuminate\Database\Seeder;

class PromoActionButtonSeeder extends Seeder
{
    public function run(): void
    {
        PromoActionButton::query()->upsert([
            [
                'title' => 'Получить промокод',
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'title' => 'Перейти на сайт',
                'is_active' => true,
                'sort_order' => 20,
            ],
            [
                'title' => 'Записаться',
                'is_active' => true,
                'sort_order' => 30,
            ],
        ], ['title'], ['is_active', 'sort_order']);
    }
}
