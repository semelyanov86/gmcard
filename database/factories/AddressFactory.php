<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'open_hours' => '9:00-18:00',
            'phone' => $this->faker->phoneNumber(),
            'phone_secondary' => $this->faker->phoneNumber(),
            'website' => $this->faker->url(),
        ];
    }
}
