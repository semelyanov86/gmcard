<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'description' => fake()->optional(0.7)->paragraph(),
            'parent_id' => fake()->numberBetween(1, 10),
            'is_starred' => fake()->boolean(20),
        ];
    }
}
