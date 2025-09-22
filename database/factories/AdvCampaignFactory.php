<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdvCampaignFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'description' => fake()->paragraph(),
            'crmid' => fake()->numberBetween(1, 9) . 'x' . fake()->numberBetween(1000, 9999),
            'action_details' => [
                'reward' => fake()->numberBetween(100, 1000),
                'target_audience' => fake()->words(3, true),
                'budget' => fake()->numberBetween(10000, 100000),
            ],
            'deeplink' => fake()->optional(0.6)->url(),
            'avg_hold_time' => fake()->optional(0.7)->time(),
            'avg_money_transfer_time' => fake()->optional(0.7)->time(),
        ];
    }
}
