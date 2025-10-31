<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\JobStatusType;
use App\Enums\GenderType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18, 80),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'balance' => fake()->randomFloat(2, 0, 10000),
            'bonus_balance' => fake()->numberBetween(0, 1000),
            'job' => fake()->jobTitle(),
            'job_status' => fake()->randomElement([JobStatusType::EMPLOYED->value, JobStatusType::SELF_EMPLOYED->value, JobStatusType::FREELANCER->value]),
            'city' => fake()->numberBetween(1, 100),
            'country' => fake()->country(),
            'birth_date' => fake()->date('Y-m-d', '2000-01-01'),
            'gender' => fake()->randomElement(GenderType::cases()),
            'code' => fake()->unique()->numerify('PROMO####'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
