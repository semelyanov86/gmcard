<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BonusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'amount' => fake()->numberBetween(10, 1000),
            'code' => fake()->optional(0.6)->numerify('BONUS####'),
            'source_id' => User::factory(),
            'target_id' => User::factory(),
            'type' => fake()->randomElement(['incoming', 'outgoing']),
        ];
    }
}
