<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\HelpPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<HelpPost>
 */
class HelpPostFactory extends Factory
{
    protected $model = HelpPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->paragraphs(3, true),
        ];
    }
}
