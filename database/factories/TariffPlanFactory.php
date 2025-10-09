<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TariffPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TariffPlan>
 */
class TariffPlanFactory extends Factory
{
    protected $model = TariffPlan::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug(),
            'name' => $this->faker->unique()->words(2, true),
            'description' => $this->faker->optional()->sentence(8),
            'price' => 0,
            'ads_count' => $this->faker->numberBetween(0, 10),
            'banner_price' => 0,
        ];
    }
}
