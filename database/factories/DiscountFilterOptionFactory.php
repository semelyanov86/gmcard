<?php

namespace Database\Factories;

use App\Models\DiscountFilterOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DiscountFilterOption>
 */
final class DiscountFilterOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DiscountFilterOption::class;

    public function definition(): array
    {
        $percent = $this->faker->randomElement(range(5, 100, 5));

        return [
            'min_percent' => $percent,
            'sort_order' => intdiv($percent, 5),
        ];
    }
}
