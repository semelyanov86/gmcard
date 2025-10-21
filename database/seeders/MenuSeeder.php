<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $navbarItems = [
            ['label' => 'Главная', 'url' => '/', 'order' => 1],
            ['label' => 'Пользователям', 'url' => '/discount.html', 'order' => 2],
            ['label' => 'Кэшбэк', 'url' => '/#popular', 'order' => 3],
            ['label' => 'Для бизнеса', 'url' => '/buis_new.html', 'order' => 4],
            ['label' => 'Правила', 'url' => '/help.html', 'order' => 5],
            ['label' => 'Контакты', 'url' => '/help.html', 'order' => 6],
            ['label' => 'GM', 'url' => '/buis.html', 'order' => 7],
            ['label' => '₽', 'url' => '/coupon.html', 'order' => 8],
        ];

        foreach ($navbarItems as $item) {
            Menu::query()->create([
                'label' => $item['label'],
                'url' => $item['url'],
                'type' => 'navbar',
                'order' => $item['order'],
                'is_active' => true,
            ]);
        }

        $sidebarItems = [
            ['label' => 'Личный кабинет', 'url' => '', 'order' => 1],
            ['label' => 'Запустить акцию', 'url' => '', 'order' => 2],
            ['label' => 'Мои акции', 'url' => '', 'order' => 3],
            ['label' => 'Мои акции с купонами', 'url' => '', 'order' => 4],
            ['label' => 'Мои купоны', 'url' => '', 'order' => 5],
            ['label' => 'Мои черновики', 'url' => '', 'order' => 6],
        ];

        foreach ($sidebarItems as $item) {
            Menu::query()->create([
                'label' => $item['label'],
                'url' => $item['url'],
                'type' => 'sidebar',
                'order' => $item['order'],
                'is_active' => true,
            ]);
        }
    }
}
