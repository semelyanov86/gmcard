<?php

declare(strict_types=1);

return [
    'business' => [
        'title' => 'GM CARD для бизнеса: Привлекайте клиентов скидками и бонусами | Партнерская программа',
        'description' => 'Подключите свой бизнес, ИП или самозанятость к GM Card. Получите новых клиентов, увеличьте средний чек и лояльность с помощью нашей программы скидок и бонусов.',
        'canonical' => 'https://gmcard.ru/',
        'og' => [
            'title' => 'GM CARD для бизнеса: Привлекайте клиентов скидками и бонусами | Партнерская программа',
            'description' => 'Подключите свой бизнес, ИП или самозанятость к GM Card. Получите новых клиентов, увеличьте средний чек и лояльность с помощью нашей программы скидок и бонусов.',
            'image' => 'https://gmcard.ru/images/png/og-business.jpg',
            'type' => 'website',
        ],
        'schema' => [
            'organization' => [
                '@type' => 'Organization',
                'name' => 'GM CARD',
                'url' => 'https://gmcard.ru/',
                'logo' => 'https://gmcard.ru/images/png/gm-logo.png',
                'description' => 'Платформа для подключения бизнеса к программе скидок и бонусов',
                'contactPoint' => [
                    '@type' => 'ContactPoint',
                    'contactType' => 'customer service',
                    'email' => 'support@gmcard.ru',
                ],
            ],
            'website' => [
                '@type' => 'WebSite',
                'name' => 'GM CARD для бизнеса',
                'url' => 'https://gmcard.ru/',
                'description' => 'Подключите свой бизнес, ИП или самозанятость к GM Card. Получите новых клиентов, увеличьте средний чек и лояльность с помощью нашей программы скидок и бонусов.',
            ],
        ],
    ],
];
