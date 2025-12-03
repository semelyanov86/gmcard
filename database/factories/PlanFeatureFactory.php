<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PlanFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PlanFeature>
 */
class PlanFeatureFactory extends Factory
{
    protected $model = PlanFeature::class;

    public function definition(): array
    {
        return [
            'system_name' => $this->faker->unique()->slug(),
            'display_name' => $this->faker->sentence(3),
            'description' => $this->faker->optional()->sentence(8),
        ];
    }
}
