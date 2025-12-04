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
                'system_name' => 'custom_promotions',
                'display_name' => 'возможность создавать свои акции, скидки, конкурсы и т.д.',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'banner_slots_total',
                'display_name' => 'Сколько мест под акции в баннере всего?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'free_promos_limit',
                'display_name' => 'Сколько акций можно запускать одновременно бесплатно?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'extra_ad_price',
                'display_name' => 'Стоимость запуска акции сверх лимита?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'banner_price',
                'display_name' => 'Стоимость размещения в баннере?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'own_banner_slots_total',
                'display_name' => 'Сколько мест под ваши акции в баннере всего?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'cashback_bonus',
                'display_name' => 'Какой кешбэк с кешбэк акций?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'auto_schedule_enabled',
                'display_name' => 'Автопланирование акций по дням и часам?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'auto_restart_enabled',
                'display_name' => 'Возможность автоперезапуска акции по истечении времени?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
            ],
            [
                'system_name' => 'auto_bump_enabled',
                'display_name' => 'Возможность автоподъема акции на первое место?',
                'description' => null,
                'tariff_slugs' => ['free', 'pro', 'expert'],
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
