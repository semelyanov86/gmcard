<?php

declare(strict_types=1);

namespace Database\Seeders\Finance;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['payment_date' => '2025-01-02 10:00:00', 'amount' => 500, 'type' => 'Списание', 'currency' => 'RUB', 'description' => 'Оплата заказа #1001', 'transaction_id' => 1, 'user_id' => 1],
            ['payment_date' => '2025-01-05 12:30:00', 'amount' => 1200, 'type' => 'Поступление', 'currency' => 'RUB', 'description' => 'Пополнение баланса', 'transaction_id' => 2, 'user_id' => 2],
            ['payment_date' => '2025-01-09 09:15:00', 'amount' => 800, 'type' => 'Списание', 'currency' => 'RUB', 'description' => 'Оплата заказа #1002', 'transaction_id' => 3, 'user_id' => 3],
            ['payment_date' => '2025-01-12 18:05:00', 'amount' => 150, 'type' => 'Поступление', 'currency' => 'RUB', 'description' => 'Кэшбэк за покупку', 'transaction_id' => 4, 'user_id' => 4],
            ['payment_date' => '2025-01-15 11:40:00', 'amount' => 2300, 'type' => 'Списание', 'currency' => 'RUB', 'description' => 'Оплата заказа #1003', 'transaction_id' => 5, 'user_id' => 5],
            ['payment_date' => '2025-01-20 14:20:00', 'amount' => 300, 'type' => 'Поступление', 'currency' => 'RUB', 'description' => 'Кэшбэк по акции', 'transaction_id' => 6, 'user_id' => 6],
            ['payment_date' => '2025-02-01 16:10:00', 'amount' => 1000, 'type' => 'Списание', 'currency' => 'RUB', 'description' => 'Оплата заказа #1004', 'transaction_id' => 7, 'user_id' => 7],
            ['payment_date' => '2025-02-05 09:50:00', 'amount' => 2000, 'type' => 'Поступление', 'currency' => 'RUB', 'description' => 'Пополнение баланса', 'transaction_id' => 8, 'user_id' => 8],
            ['payment_date' => '2025-02-10 13:35:00', 'amount' => 450, 'type' => 'Поступление', 'currency' => 'RUB', 'description' => 'Кэшбэк за заказы', 'transaction_id' => 9, 'user_id' => 9],
            ['payment_date' => '2025-02-14 19:25:00', 'amount' => 1500, 'type' => 'Списание', 'currency' => 'RUB', 'description' => 'Оплата заказа #1005', 'transaction_id' => 10, 'user_id' => 10],
        ];

        foreach ($items as $data) {
            Payment::query()->create($data);
        }
    }
}
