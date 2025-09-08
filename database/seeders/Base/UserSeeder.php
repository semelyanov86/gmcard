<?php

declare(strict_types=1);

namespace Database\Seeders\Base;

use App\Models\User;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	public function run(): void
	{
		$users = [
			['name' => 'Иван', 'last_name' => 'Иванов', 'age' => 28, 'email' => 'ivan.ivanov@example.com', 'job' => 'Маркетолог', 'job_status' => 'трудоустроен', 'city_name' => 'Москва', 'country' => 'Россия', 'birth_date' => '1997-03-12', 'role' => 'user', 'gender' => 'male', 'code' => '100101'],
			['name' => 'Мария', 'last_name' => 'Петрова', 'age' => 31, 'email' => 'maria.petrova@example.com', 'job' => 'Дизайнер', 'job_status' => 'самозанятый', 'city_name' => 'Санкт-Петербург', 'country' => 'Россия', 'birth_date' => '1994-07-22', 'role' => 'user', 'gender' => 'female', 'code' => '100102'],
			['name' => 'Алексей', 'last_name' => 'Смирнов', 'age' => 35, 'email' => 'alexey.smirnov@example.com', 'job' => 'Разработчик', 'job_status' => 'трудоустроен', 'city_name' => 'Казань', 'country' => 'Россия', 'birth_date' => '1990-11-05', 'role' => 'user', 'gender' => 'male', 'code' => '100103'],
			['name' => 'Елена', 'last_name' => 'Соколова', 'age' => 26, 'email' => 'elena.sokolova@example.com', 'job' => 'Копирайтер', 'job_status' => 'фрилансер', 'city_name' => 'Екатеринбург', 'country' => 'Россия', 'birth_date' => '1999-01-18', 'role' => 'user', 'gender' => 'female', 'code' => '100104'],
			['name' => 'Дмитрий', 'last_name' => 'Кузнецов', 'age' => 42, 'email' => 'dmitry.kuznetsov@example.com', 'job' => 'Менеджер', 'job_status' => 'трудоустроен', 'city_name' => 'Новосибирск', 'country' => 'Россия', 'birth_date' => '1983-06-09', 'role' => 'user', 'gender' => 'male', 'code' => '100105'],
			['name' => 'Ольга', 'last_name' => 'Попова', 'age' => 29, 'email' => 'olga.popova@example.com', 'job' => 'HR-специалист', 'job_status' => 'трудоустроен', 'city_name' => 'Самара', 'country' => 'Россия', 'birth_date' => '1996-09-30', 'role' => 'user', 'gender' => 'female', 'code' => '100106'],
			['name' => 'Сергей', 'last_name' => 'Васильев', 'age' => 37, 'email' => 'sergey.vasiliev@example.com', 'job' => 'Аналитик', 'job_status' => 'трудоустроен', 'city_name' => 'Уфа', 'country' => 'Россия', 'birth_date' => '1988-12-14', 'role' => 'user', 'gender' => 'male', 'code' => '100107'],
			['name' => 'Анна', 'last_name' => 'Морозова', 'age' => 33, 'email' => 'anna.morozova@example.com', 'job' => 'PR-менеджер', 'job_status' => 'самозанятый', 'city_name' => 'Ростов-на-Дону', 'country' => 'Россия', 'birth_date' => '1992-04-03', 'role' => 'user', 'gender' => 'female', 'code' => '100108'],
			['name' => 'Павел', 'last_name' => 'Зайцев', 'age' => 30, 'email' => 'pavel.zaytsev@example.com', 'job' => 'DevOps-инженер', 'job_status' => 'трудоустроен', 'city_name' => 'Нижний Новгород', 'country' => 'Россия', 'birth_date' => '1995-05-27', 'role' => 'user', 'gender' => 'male', 'code' => '100109'],
			['name' => 'Наталья', 'last_name' => 'Волкова', 'age' => 27, 'email' => 'natalia.volkova@example.com', 'job' => 'SMM-специалист', 'job_status' => 'фрилансер', 'city_name' => 'Челябинск', 'country' => 'Россия', 'birth_date' => '1998-08-16', 'role' => 'user', 'gender' => 'female', 'code' => '100110'],
		];

		foreach ($users as $data) {
			$cityId = City::query()->where('name', $data['city_name'])->value('id');
			User::query()->create([
				'name' => $data['name'],
				'last_name' => $data['last_name'],
				'age' => $data['age'],
				'email' => $data['email'],
				'job' => $data['job'],
				'job_status' => $data['job_status'],
				'city' => $cityId,
				'country' => $data['country'],
				'birth_date' => $data['birth_date'],
				'role' => $data['role'],
				'gender' => $data['gender'],
				'code' => $data['code'],
				'password' => Hash::make('password'),
			]);
		}
	}
} 