<?php

declare(strict_types=1);

namespace Database\Seeders\Business;

use App\Models\AdvCampaign;
use Illuminate\Database\Seeder;

class AdvCampaignSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'Кампания «Старт лета»', 'description' => 'Скидки на сезонные товары', 'crmid' => '11x1001', 'action_details' => ['условия' => 'Покупка от 1000 ₽', 'действие' => 'покупка'], 'deeplink' => 'app://promo/start-summer', 'avg_hold_time' => 3, 'avg_money_transfer_time' => 2],
            ['name' => 'Кампания «Выходные»', 'description' => 'Акции только по выходным', 'crmid' => '11x1002', 'action_details' => ['условия' => 'Только суббота-воскресенье', 'действие' => 'покупка'], 'deeplink' => 'app://promo/weekend', 'avg_hold_time' => 2, 'avg_money_transfer_time' => 1],
            ['name' => 'Кампания «Кэшбэк+»', 'description' => 'Повышенный кэшбэк', 'crmid' => '11x1003', 'action_details' => ['условия' => 'Карта лояльности', 'действие' => 'покупка'], 'deeplink' => null, 'avg_hold_time' => 4, 'avg_money_transfer_time' => 3],
            ['name' => 'Кампания «Приведи друга»', 'description' => 'Бонусы за приглашения', 'crmid' => '11x1004', 'action_details' => ['условия' => 'Регистрация друга', 'действие' => 'регистрация'], 'deeplink' => 'app://promo/ref', 'avg_hold_time' => 1, 'avg_money_transfer_time' => 1],
            ['name' => 'Кампания «Осень SALE»', 'description' => 'Сезонные скидки', 'crmid' => '11x1005', 'action_details' => ['условия' => 'Без ограничений', 'действие' => 'покупка'], 'deeplink' => null, 'avg_hold_time' => 5, 'avg_money_transfer_time' => 4],
            ['name' => 'Кампания «Подарок»', 'description' => 'Подарок при заказе', 'crmid' => '11x1006', 'action_details' => ['условия' => 'Заказ от 2000 ₽', 'действие' => 'покупка'], 'deeplink' => 'app://promo/gift', 'avg_hold_time' => 2, 'avg_money_transfer_time' => 2],
            ['name' => 'Кампания «Экспресс»', 'description' => 'Быстрые выплаты', 'crmid' => '11x1007', 'action_details' => ['условия' => 'Онлайн оплата', 'действие' => 'покупка'], 'deeplink' => null, 'avg_hold_time' => 1, 'avg_money_transfer_time' => 1],
            ['name' => 'Кампания «Семейная»', 'description' => 'Скидки для семьи', 'crmid' => '11x1008', 'action_details' => ['условия' => 'Детские товары', 'действие' => 'покупка'], 'deeplink' => 'app://promo/family', 'avg_hold_time' => 3, 'avg_money_transfer_time' => 2],
            ['name' => 'Кампания «Онлайн»', 'description' => 'Только онлайн заказы', 'crmid' => '11x1009', 'action_details' => ['условия' => 'Только онлайн', 'действие' => 'покупка'], 'deeplink' => null, 'avg_hold_time' => 2, 'avg_money_transfer_time' => 2],
            ['name' => 'Кампания «Новосел»', 'description' => 'Скидки в электронике', 'crmid' => '11x1010', 'action_details' => ['условия' => 'Техника для дома', 'действие' => 'покупка'], 'deeplink' => 'app://promo/new-home', 'avg_hold_time' => 6, 'avg_money_transfer_time' => 5],
        ];

        foreach ($items as $data) {
            AdvCampaign::query()->create($data);
        }
    }
}
