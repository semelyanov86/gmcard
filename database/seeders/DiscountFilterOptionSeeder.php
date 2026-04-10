<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\DiscountFilterOption;
use Illuminate\Database\Seeder;

class DiscountFilterOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['min_percent' => 5, 'sort_order' => 1],
            ['min_percent' => 10, 'sort_order' => 2],
            ['min_percent' => 15, 'sort_order' => 3],
            ['min_percent' => 20, 'sort_order' => 4],
            ['min_percent' => 25, 'sort_order' => 5],
            ['min_percent' => 30, 'sort_order' => 6],
            ['min_percent' => 35, 'sort_order' => 7],
            ['min_percent' => 40, 'sort_order' => 8],
            ['min_percent' => 45, 'sort_order' => 9],
            ['min_percent' => 50, 'sort_order' => 10],
            ['min_percent' => 55, 'sort_order' => 11],
            ['min_percent' => 60, 'sort_order' => 12],
            ['min_percent' => 65, 'sort_order' => 13],
            ['min_percent' => 70, 'sort_order' => 14],
            ['min_percent' => 75, 'sort_order' => 15],
            ['min_percent' => 80, 'sort_order' => 16],
            ['min_percent' => 85, 'sort_order' => 17],
            ['min_percent' => 90, 'sort_order' => 18],
            ['min_percent' => 95, 'sort_order' => 19],
            ['min_percent' => 100, 'sort_order' => 20],
        ];

        DiscountFilterOption::query()->insert($rows);
    }
}
