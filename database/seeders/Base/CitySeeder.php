<?php

declare(strict_types=1);

namespace Database\Seeders\Base;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
	public function run(): void
	{
		$cities = [
			['name' => 'Москва', 'country' => 'Россия'],
			['name' => 'Санкт-Петербург', 'country' => 'Россия'],
			['name' => 'Новосибирск', 'country' => 'Россия'],
			['name' => 'Екатеринбург', 'country' => 'Россия'],
			['name' => 'Казань', 'country' => 'Россия'],
			['name' => 'Нижний Новгород', 'country' => 'Россия'],
			['name' => 'Челябинск', 'country' => 'Россия'],
			['name' => 'Самара', 'country' => 'Россия'],
			['name' => 'Уфа', 'country' => 'Россия'],
			['name' => 'Ростов-на-Дону', 'country' => 'Россия'],
		];

		foreach ($cities as $data) {
			City::query()->create($data);
		}
	}
} 