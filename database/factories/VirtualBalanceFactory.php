<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\PaymentType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VirtualBalanceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'compensation_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'amount' => fake()->numberBetween(10, 1000),
            'type' => fake()->randomElement(PaymentType::cases()),
            'description' => fake()->optional(0.7)->sentence(),
            'user_id' => User::factory(),
        ];
    }
}
