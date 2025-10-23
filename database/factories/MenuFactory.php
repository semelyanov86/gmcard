<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\MenuType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => fake()->words(2, true),
            'url' => fake()->url(),
            'type' => fake()->randomElement(MenuType::cases()),
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
