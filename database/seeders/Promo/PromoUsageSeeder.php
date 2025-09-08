<?php

declare(strict_types=1);

namespace Database\Seeders\Promo;

use App\Models\PromoUsage;
use Illuminate\Database\Seeder;

class PromoUsageSeeder extends Seeder
{
	public function run(): void
	{
		$items = [
			['used_at' => '2025-01-11 12:00:00', 'user_id' => 1, 'promo_id' => 1, 'ip' => '127.0.0.1'],
			['used_at' => '2025-01-18 18:30:00', 'user_id' => 2, 'promo_id' => 2, 'ip' => '127.0.0.2'],
			['used_at' => '2025-02-02 15:45:00', 'user_id' => 3, 'promo_id' => 3, 'ip' => '127.0.0.3'],
			['used_at' => '2025-01-06 10:15:00', 'user_id' => 4, 'promo_id' => 4, 'ip' => '127.0.0.4'],
			['used_at' => '2025-01-21 14:10:00', 'user_id' => 5, 'promo_id' => 5, 'ip' => '127.0.0.5'],
			['used_at' => '2025-02-12 19:05:00', 'user_id' => 6, 'promo_id' => 6, 'ip' => '127.0.0.6'],
			['used_at' => '2025-02-16 20:00:00', 'user_id' => 7, 'promo_id' => 7, 'ip' => '127.0.0.7'],
			['used_at' => '2025-02-23 11:25:00', 'user_id' => 8, 'promo_id' => 8, 'ip' => '127.0.0.8'],
			['used_at' => '2025-03-03 13:55:00', 'user_id' => 9, 'promo_id' => 9, 'ip' => '127.0.0.9'],
			['used_at' => '2025-03-06 09:40:00', 'user_id' => 10, 'promo_id' => 10, 'ip' => '127.0.0.10'],
		];

		foreach ($items as $data) {
			PromoUsage::query()->create($data);
		}
	}
} 