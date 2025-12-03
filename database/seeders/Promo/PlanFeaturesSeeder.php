<?php

declare(strict_types=1);

namespace Database\Seeders\Promo;

use App\Models\PlanFeature;
use App\Models\TariffPlan;
use Illuminate\Database\Seeder;

class PlanFeaturesSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'system_name' => 'base_capabilities',
                'display_name' => 'базовый набор возможностей',
                'description' => null,
                'tariff_slugs' => ['free'],
            ],
            [
                'system_name' => 'free_promo_creation',
                'display_name' => 'бесплатное создание акций',
                'description' => null,
                'tariff_slugs' => ['free'],
            ],
            [
                'system_name' => 'standard_cashback',
                'display_name' => 'стандартный кэшбэк',
                'description' => null,
                'tariff_slugs' => ['free'],
            ],
            [
                'system_name' => 'editable_badge',
                'display_name' => 'редактируемый бейдж',
                'description' => null,
                'tariff_slugs' => ['free'],
            ],
            [
                'system_name' => 'standard_withdraw_fee',
                'display_name' => 'стандартная комиссия за вывод средств',
                'description' => null,
                'tariff_slugs' => ['free'],
            ],
            [
                'system_name' => 'more_features_below',
                'display_name' => 'и многое другое, подробнее ниже',
                'description' => null,
                'tariff_slugs' => ['free'],
            ],

            [
                'system_name' => 'pro_more_capabilities',
                'display_name' => 'больше возможностей',
                'description' => null,
                'tariff_slugs' => ['pro'],
            ],
            [
                'system_name' => 'pro_free_promo_creation',
                'display_name' => 'бесплатное создание акций',
                'description' => null,
                'tariff_slugs' => ['pro'],
            ],
            [
                'system_name' => 'pro_increased_cashback',
                'display_name' => 'повышенный кэшбэк',
                'description' => null,
                'tariff_slugs' => ['pro'],
            ],
            [
                'system_name' => 'pro_premium_badge',
                'display_name' => 'премиум бейдж',
                'description' => null,
                'tariff_slugs' => ['pro'],
            ],
            [
                'system_name' => 'pro_lower_withdraw_fee',
                'display_name' => 'пониженная комиссия за вывод средств',
                'description' => null,
                'tariff_slugs' => ['pro'],
            ],
            [
                'system_name' => 'pro_more_features_below',
                'display_name' => 'и многое другое, подробнее ниже',
                'description' => null,
                'tariff_slugs' => ['pro'],
            ],

            [
                'system_name' => 'exp_base_capabilities',
                'display_name' => 'базовый набор возможностей',
                'description' => null,
                'tariff_slugs' => ['expert'],
            ],
            [
                'system_name' => 'exp_free_promo_creation',
                'display_name' => 'бесплатное создание акций',
                'description' => null,
                'tariff_slugs' => ['expert'],
            ],
            [
                'system_name' => 'exp_standard_cashback',
                'display_name' => 'стандартный кэшбэк',
                'description' => null,
                'tariff_slugs' => ['expert'],
            ],
            [
                'system_name' => 'exp_editable_badge',
                'display_name' => 'редактируемый бейдж',
                'description' => null,
                'tariff_slugs' => ['expert'],
            ],
            [
                'system_name' => 'exp_standard_withdraw_fee',
                'display_name' => 'стандартная комиссия за вывод средств',
                'description' => null,
                'tariff_slugs' => ['expert'],
            ],
            [
                'system_name' => 'exp_more_features_below',
                'display_name' => 'и многое другое, подробнее ниже',
                'description' => null,
                'tariff_slugs' => ['expert'],
            ],
        ];

        foreach ($features as $featureData) {
            $feature = PlanFeature::query()->firstOrCreate(
                ['system_name' => $featureData['system_name']],
                [
                    'display_name' => $featureData['display_name'],
                    'description' => $featureData['description'],
                ],
            );

            foreach ($featureData['tariff_slugs'] as $slug) {
                $tariff = TariffPlan::query()->where('slug', $slug)->first();

                if (! $tariff) {
                    continue;
                }

                $tariff->features()->syncWithoutDetaching([
                    $feature->id => ['is_included' => true],
                ]);
            }
        }
    }
}


