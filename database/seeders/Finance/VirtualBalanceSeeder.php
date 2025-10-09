<?php

declare(strict_types=1);

namespace Database\Seeders\Finance;

use App\Models\VirtualBalance;
use Illuminate\Database\Seeder;

class VirtualBalanceSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['compensation_date' => '2025-01-03 10:00:00', 'amount' => 100, 'type' => 'Поступление', 'description' => 'Бонус за регистрацию', 'user_id' => 1],
            ['compensation_date' => '2025-01-07 12:30:00', 'amount' => 50, 'type' => 'Списание', 'description' => 'Использование баллов', 'user_id' => 2],
            ['compensation_date' => '2025-01-10 09:15:00', 'amount' => 200, 'type' => 'Поступление', 'description' => 'Бонус за активность', 'user_id' => 3],
            ['compensation_date' => '2025-01-13 18:05:00', 'amount' => 75, 'type' => 'Списание', 'description' => 'Обмен на скидку', 'user_id' => 4],
            ['compensation_date' => '2025-01-16 11:40:00', 'amount' => 150, 'type' => 'Поступление', 'description' => 'Кэшбэк баллами', 'user_id' => 5],
            ['compensation_date' => '2025-01-21 14:20:00', 'amount' => 30, 'type' => 'Списание', 'description' => 'Покупка товара баллами', 'user_id' => 6],
            ['compensation_date' => '2025-02-02 16:10:00', 'amount' => 250, 'type' => 'Поступление', 'description' => 'Бонус по акции', 'user_id' => 7],
            ['compensation_date' => '2025-02-06 09:50:00', 'amount' => 120, 'type' => 'Списание', 'description' => 'Оплата баллами', 'user_id' => 8],
            ['compensation_date' => '2025-02-11 13:35:00', 'amount' => 80, 'type' => 'Поступление', 'description' => 'Подарочные баллы', 'user_id' => 9],
            ['compensation_date' => '2025-02-15 19:25:00', 'amount' => 60, 'type' => 'Списание', 'description' => 'Использование на услуги', 'user_id' => 10],
        ];

        foreach ($items as $data) {
            VirtualBalance::query()->create($data);
        }
    }
}
