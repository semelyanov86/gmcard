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
            ['name' => 'Москва', 'country' => 'ru'],
            ['name' => 'Санкт-Петербург', 'country' => 'ru'],
            ['name' => 'Новосибирск', 'country' => 'ru'],
            ['name' => 'Екатеринбург', 'country' => 'ru'],
            ['name' => 'Казань', 'country' => 'ru'],
            ['name' => 'Минск', 'country' => 'by'],
            ['name' => 'Алматы', 'country' => 'kz'],
            ['name' => 'Астана', 'country' => 'kz'],
            ['name' => 'Киев', 'country' => 'ua'],
            ['name' => 'Ташкент', 'country' => 'uz'],
        ];

        foreach ($cities as $data) {
            City::query()->create($data);
        }
    }
}
