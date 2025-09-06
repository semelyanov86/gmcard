<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BonusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'amount'     => $this->faker->numberBetween(10, 1000),
            'code'       => strtoupper(Str::random(6)),
            'source_id'  => User::factory(),
            'target_id'  => User::factory(),
            'type'       => $this->faker->randomElement(['gift', 'referral']),
        ];
    }
}
