<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $navbarItems = [
            ['label' => 'Главная', 'url' => route('main', [], false), 'order' => 1],
            ['label' => 'Пользователям', 'url' => route('user.landing', [], false), 'order' => 2],
            ['label' => 'Кэшбэк', 'url' => route('main', [], false) . '#popular', 'order' => 3],
            ['label' => 'Для бизнеса', 'url' => route('business.landing', [], false), 'order' => 4],
            ['label' => 'Правила', 'url' => route('help.post', ['slug' => 'community-rules'], false), 'order' => 5],
            ['label' => 'Контакты', 'url' => route('help', [], false), 'order' => 6],
            ['label' => 'GM', 'url' => route('help.post', ['slug' => 'about-gm1lp'], false), 'order' => 7],
            ['label' => '₽', 'url' => route('help.post', ['slug' => 'about-discounts-service'], false), 'order' => 8],
        ];

        foreach ($navbarItems as $item) {
            Menu::query()->create([
                'label' => $item['label'],
                'url' => $item['url'],
                'type' => MenuType::NAVBAR,
                'order' => $item['order'],
                'is_active' => true,
            ]);
        }

        $sidebarItems = [
            ['label' => 'Личный кабинет', 'url' => '/profile', 'order' => 1],
            ['label' => 'Запустить акцию', 'url' => '/promos/create', 'order' => 2],
            ['label' => 'Мои акции', 'url' => '/promos', 'order' => 3],
            ['label' => 'Мои акции с купонами', 'url' => '/promos/coupons', 'order' => 4],
            ['label' => 'Мои купоны', 'url' => '/coupons', 'order' => 5],
            ['label' => 'Мои черновики', 'url' => '/promos/drafts', 'order' => 6],
        ];

        foreach ($sidebarItems as $item) {
            Menu::query()->create([
                'label' => $item['label'],
                'url' => $item['url'],
                'type' => MenuType::SIDEBAR,
                'order' => $item['order'],
                'is_active' => true,
            ]);
        }

        $promoSidebarItems = [
            ['label' => 'Личный кабинет', 'url' => '/profile', 'order' => 1],
            ['label' => 'Запустить акцию', 'url' => '/promos/create', 'order' => 2],
            ['label' => 'Мои акции', 'url' => '/profile', 'order' => 3],
            ['label' => 'Мои акции с купонами', 'url' => '/profile', 'order' => 4],
            ['label' => 'Мои купоны', 'url' => '/profile', 'order' => 5],
            ['label' => 'Мои черновики', 'url' => '/profile', 'order' => 6],
        ];

        foreach ($promoSidebarItems as $item) {
            Menu::query()->create([
                'label' => $item['label'],
                'url' => $item['url'],
                'type' => MenuType::PROMO_SIDEBAR,
                'order' => $item['order'],
                'is_active' => true,
            ]);
        }
    }
}
