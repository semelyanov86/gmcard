<?php

declare(strict_types=1);

namespace Database\Seeders\Promo;

use App\Models\TariffPlan;
use Illuminate\Database\Seeder;

class TariffPlansSeeder extends Seeder
{
    public function run(): void
    {
        $tariffPlans = [
            [
                'name' => 'Free',
                'description' => 'Базовый тариф: 1 акция бесплатна, остальные 3₽, баннер 30₽',
                'price' => 0,
                'ads_count' => 1,
                'banner_price' => 3000,
            ],
            [
                'name' => 'Pro',
                'description' => 'Профессиональный тариф: 5 акций бесплатно, остальные 2₽, баннер 20₽',
                'price' => 0,
                'ads_count' => 5,
                'banner_price' => 2000,
            ],
            [
                'name' => 'Expert',
                'description' => 'Экспертный тариф: 8 акций бесплатно, остальные 1₽, баннер 10₽',
                'price' => 0,
                'ads_count' => 8,
                'banner_price' => 1000,
            ],
        ];

        foreach ($tariffPlans as $tariffPlan) {
            TariffPlan::query()->create($tariffPlan);
        }
    }
}
