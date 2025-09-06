<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganisationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'address_id' => Address::factory(),
            'name' => fake()->company(),
            'owner_role' => fake()->randomElement(['owner', 'manager', 'secretary', 'other']),
            'inn' => fake()->numerify('##########'),
            'ogrn' => fake()->numerify('###############'),
            'contact' => fake()->phoneNumber(),
            'contact_fio' => fake()->name(),
            'opening_hours' => [
                'monday' => '9:00-18:00',
                'tuesday' => '9:00-18:00',
                'wednesday' => '9:00-18:00',
                'thursday' => '9:00-18:00',
                'friday' => '9:00-18:00',
                'saturday' => '10:00-16:00',
                'sunday' => 'closed'
            ],
            'user_id' => User::factory(),
        ];
    }
}
