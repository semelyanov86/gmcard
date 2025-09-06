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
            'type' => fake()->randomElement(['basic', 'premium', 'pro', 'enterprise']),
            'amount' => fake()->numberBetween(500, 5000),
            'periodicity' => fake()->randomElement(['monthly', 'yearly', 'quarterly']),
        ];
    }
}
