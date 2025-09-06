<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdvCampaignFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'crmid' => $this->faker->uuid(),
            'action_details' => ['bonus' => '10%', 'cashback' => '5%'],
            'deeplink' => $this->faker->url(),
            'avg_hold_time' => $this->faker->numberBetween(1, 60),
            'avg_money_transfer_time' => $this->faker->numberBetween(1, 24),
        ];
    }
}
