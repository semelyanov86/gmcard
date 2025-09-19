<?php

declare(strict_types=1);

namespace Database\Seeders\Promo;

use App\Models\Bonus;
use Illuminate\Database\Seeder;

class BonusSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['amount' => 150, 'code' => 1, 'type' => 'Поступление', 'source_id' => 1, 'target_id' => 2],
            ['amount' => 200, 'code' => 2, 'type' => 'Списание', 'source_id' => 2, 'target_id' => 3],
            ['amount' => 76, 'code' => 3, 'type' => 'Поступление', 'source_id' => 3, 'target_id' => 4],
            ['amount' => 95, 'code' => 4, 'type' => 'Списание', 'source_id' => 4, 'target_id' => 5],
            ['amount' => 120, 'code' => 5, 'type' => 'Поступление', 'source_id' => 5, 'target_id' => 6],
            ['amount' => 60, 'code' => 6, 'type' => 'Списание', 'source_id' => 6, 'target_id' => 7],
            ['amount' => 300, 'code' => 7, 'type' => 'Поступление', 'source_id' => 7, 'target_id' => 8],
            ['amount' => 50, 'code' => 8, 'type' => 'Списание', 'source_id' => 8, 'target_id' => 9],
            ['amount' => 33, 'code' => 9, 'type' => 'Поступление', 'source_id' => 9, 'target_id' => 10],
            ['amount' => 500, 'code' => 10, 'type' => 'Списание', 'source_id' => 10, 'target_id' => 1],
        ];

        foreach ($items as $data) {
            Bonus::query()->create($data);
        }
    }
}
