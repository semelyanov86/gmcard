<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition(): array
    {

        return [
            'payment_date' => $this->faker->dateTimeThisYear(),
            'amount' => $this->faker->numberBetween(100, 10000),
            'type' => $this->faker->randomElement(['incoming', 'outgoing']),
            'currency' => $this->faker->currencyCode(),
            'description' => $this->faker->sentence(),
            'transaction_id' => $this->faker->randomNumber(),
            'user_id' => User::factory(),
        ];
    }
}
