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
                'slug' => 'free',
                'name' => 'Free',
                'description' => 'Базовый тариф: 1 акция бесплатна, остальные 3₽/день, баннер 30₽',
                'price' => 0,
                'ads_count' => 1,
                'banner_price' => 3000,
                'extra_ad_price' => 300,
                'banner_slots_total' => 5,
                'own_banner_slots_total' => 1,
                'cashback_bonus_percent' => 0,
                'auto_schedule_enabled' => true,
                'auto_restart_enabled' => false,
                'auto_bump_enabled' => false,
            ],
            [
                'slug' => 'pro',
                'name' => 'Pro',
                'description' => 'Профессиональный тариф: 5 акций бесплатно, остальные 2₽/день, баннер 20₽',
                'price' => 0,
                'ads_count' => 5,
                'banner_price' => 2000,
                'extra_ad_price' => 200,
                'banner_slots_total' => 5,
                'own_banner_slots_total' => 1,
                'cashback_bonus_percent' => 0.5,
                'auto_schedule_enabled' => true,
                'auto_restart_enabled' => true,
                'auto_bump_enabled' => true,
            ],
            [
                'slug' => 'expert',
                'name' => 'Expert',
                'description' => 'Экспертный тариф: 8 акций бесплатно, остальные 1₽/день, баннер 10₽',
                'price' => 0,
                'ads_count' => 8,
                'banner_price' => 1000,
                'extra_ad_price' => 100,
                'banner_slots_total' => 5,
                'own_banner_slots_total' => 1,
                'cashback_bonus_percent' => 1.0,
                'auto_schedule_enabled' => true,
                'auto_restart_enabled' => true,
                'auto_bump_enabled' => true,
            ],
        ];

        foreach ($tariffPlans as $tariffPlan) {
            TariffPlan::query()->create($tariffPlan);
        }
    }
}
