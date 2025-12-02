<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PromoType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PromoType>
 */
class PromoTypeFactory extends Factory
{
    protected $model = PromoType::class;

    public function definition(): array
    {
        return [
            'code' => fake()->unique()->slug(),
            'name' => fake()->words(2, true),
            'description' => fake()->optional()->sentence(),
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
