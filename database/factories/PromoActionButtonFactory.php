<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PromoActionButton;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PromoActionButton>
 */
class PromoActionButtonFactory extends Factory
{
    protected $model = PromoActionButton::class;

    public function definition(): array
    {
        return [
            'title' => fake()->unique()->words(3, true),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 100),
        ];
    }
}
