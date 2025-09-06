<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type' => $this->faker->randomElement(['basic', 'premium']),
            'amount' => $this->faker->numberBetween(100, 1000),
            'periodicity' => $this->faker->randomElement(['monthly', 'yearly']),
        ];
    }
}
