<?php

declare(strict_types=1);

namespace Database\Seeders\Business;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
	public function run(): void
	{
		$addresses = [
			['name' => 'ул. Тверская, д. 7', 'open_hours' => 'пн-пт: 10:00-20:00; сб-вс: 11:00-18:00', 'phone' => '+7 903 123-45-67', 'phone_secondary' => '+7 925 234-56-78', 'website' => 'https://example1.ru'],
			['name' => 'Невский пр., д. 25', 'open_hours' => 'пн-вс: 09:00-21:00', 'phone' => '+7 911 111-22-33', 'phone_secondary' => null, 'website' => 'https://example2.ru'],
			['name' => 'ул. Ленина, д. 10', 'open_hours' => 'пн-пт: 08:00-19:00', 'phone' => '+7 913 222-33-44', 'phone_secondary' => null, 'website' => null],
			['name' => 'пр. Мира, д. 15', 'open_hours' => 'ежедневно: 10:00-22:00', 'phone' => '+7 916 333-44-55', 'phone_secondary' => '+7 916 444-55-66', 'website' => 'https://example3.ru'],
			['name' => 'ул. Баумана, д. 5', 'open_hours' => 'пн-сб: 10:00-20:00', 'phone' => '+7 987 555-66-77', 'phone_secondary' => null, 'website' => 'https://example4.ru'],
			['name' => 'пр. Ленина, д. 34', 'open_hours' => 'пн-пт: 10:00-18:00', 'phone' => '+7 999 666-77-88', 'phone_secondary' => null, 'website' => null],
			['name' => 'ул. Советская, д. 12', 'open_hours' => 'пн-вс: 09:00-20:00', 'phone' => '+7 915 777-88-99', 'phone_secondary' => null, 'website' => 'https://example5.ru'],
			['name' => 'ул. Университетская, д. 8', 'open_hours' => 'пн-пт: 10:00-20:00', 'phone' => '+7 926 888-99-00', 'phone_secondary' => null, 'website' => null],
			['name' => 'ул. Победы, д. 3', 'open_hours' => 'ежедневно: 08:00-20:00', 'phone' => '+7 902 999-00-11', 'phone_secondary' => '+7 902 000-11-22', 'website' => 'https://example6.ru'],
			['name' => 'ул. Горького, д. 18', 'open_hours' => 'пн-сб: 09:00-19:00', 'phone' => '+7 904 123-00-12', 'phone_secondary' => null, 'website' => null],
		];

		foreach ($addresses as $data) {
			Address::query()->create($data);
		}
	}
} 