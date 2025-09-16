<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Models\Organisation;
use App\Models\AdvCampaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'user_id' => User::factory(),
            'type' => fake()->randomElement(['simple', 'coupon', 'gift', 'one_plus_one', 'two_plus_one', 'cashback', 'konkurs']),
            'code' => fake()->optional(0.7)->bothify('PROMO##??'),
            'img' => fake()->optional(0.5)->imageUrl(),
            'amount' => fake()->numberBetween(100, 10000),
            'description' => fake()->paragraph(3),
            'extra_conditions' => fake()->paragraph(2),
            'video_link' => fake()->optional(0.3)->url(),
            'smm_links' => fake()->optional(0.6)->randomElements(['facebook.com', 'instagram.com', 'vk.com', 'telegram.me'], 2),
            'days_availability' => fake()->randomElements(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'], 5),
            'availabe_from' => fake()->dateTimeBetween('-1 month', '+1 month'),
            'available_to' => fake()->time(),
            'started_at' => fake()->optional(0.8)->dateTimeBetween('-1 week', '+1 week'),
            'available_till' => fake()->dateTimeBetween('+1 week', '+3 months'),
            'show_on_home' => fake()->boolean(30),
            'raise_on_top_hours' => fake()->numberBetween(0, 24),
            'restart_after_finish_days' => fake()->numberBetween(0, 30),
            'sales_order_from' => fake()->numberBetween(0, 5000),
            'free_delivery_from' => fake()->numberBetween(0, 3000),
            'free_delivery' => fake()->boolean(40),
            'approved_at' => fake()->optional(0.6)->dateTimeBetween('-1 week', 'now'),
            'approving_notes' => fake()->optional(0.3)->paragraph(),
            'crmid' => fake()->optional(0.5)->bothify('CRM###??'),
            'adv_campaign_id' => AdvCampaign::factory(),
            'organisation_id' => Organisation::factory(),
            'dicsount' => fake()->optional(0.8)->numberBetween(5, 50) . '%',
        ];
    }
}
