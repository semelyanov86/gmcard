<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company() . ' - ' . fake()->streetAddress(),
            'open_hours' => fake()->randomElement([
                'Пн-Пт: 9:00-18:00',
                'Пн-Вс: 10:00-22:00',
                'Пн-Сб: 8:00-20:00',
                'Круглосуточно',
                'Пн-Пт: 8:00-17:00, Сб: 9:00-15:00',
            ]),
            'phone' => fake()->phoneNumber(),
            'phone_secondary' => fake()->optional(0.3)->phoneNumber(),
            'website' => fake()->optional(0.7)->url(),
        ];
    }
}
