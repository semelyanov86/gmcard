<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['image', 'video', 'document', 'audio']),
        ];
    }
}
