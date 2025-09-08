<?php

declare(strict_types=1);

namespace Database\Seeders\Finance;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
	public function run(): void
	{
		$items = [
			['type' => 'базовая', 'amount' => 299, 'periodicity' => 'monthly', 'user_id' => 1],
			['type' => 'премиум', 'amount' => 999, 'periodicity' => 'monthly', 'user_id' => 2],
			['type' => 'партнер', 'amount' => 1999, 'periodicity' => 'yearly', 'user_id' => 3],
			['type' => 'базовая', 'amount' => 299, 'periodicity' => 'monthly', 'user_id' => 4],
			['type' => 'премиум', 'amount' => 999, 'periodicity' => 'monthly', 'user_id' => 5],
			['type' => 'партнер', 'amount' => 1999, 'periodicity' => 'yearly', 'user_id' => 6],
			['type' => 'базовая', 'amount' => 299, 'periodicity' => 'monthly', 'user_id' => 7],
			['type' => 'премиум', 'amount' => 999, 'periodicity' => 'monthly', 'user_id' => 8],
			['type' => 'базовая', 'amount' => 299, 'periodicity' => 'monthly', 'user_id' => 9],
			['type' => 'партнер', 'amount' => 1999, 'periodicity' => 'yearly', 'user_id' => 10],
		];

		foreach ($items as $data) {
			Subscription::query()->create($data);
		}
	}
} 