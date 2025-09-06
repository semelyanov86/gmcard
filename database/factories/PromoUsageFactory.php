<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromoUsageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'promo_id' => Promo::factory(),
            'used_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'user_id' => User::factory(),
            'ip' => fake()->ipv4(),
        ];
    }
}
