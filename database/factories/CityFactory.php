<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->city(),
            'country' => fake()->randomElement(['ru', 'by', 'kz']),
        ];
    }
}
