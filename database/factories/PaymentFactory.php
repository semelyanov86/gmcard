<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\PaymentType;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'amount' => fake()->numberBetween(100, 50000),
            'type' => fake()->randomElement(PaymentType::cases()),
            'currency' => fake()->randomElement(['RUB', 'USD', 'EUR']),
            'description' => fake()->sentence(),
            'transaction_id' => fake()->optional(0.8)->numerify('TXN#########'),
            'user_id' => User::factory(),
        ];
    }
}
