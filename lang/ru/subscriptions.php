<?php

declare(strict_types=1);

return [
    'group' => 'Платежи',
    'plans' => [
        'title' => 'Планы',
        'columns' => [
            'name' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'signup_fee' => 'Плата за регистрацию',
            'invoice_interval' => 'Интервал выставления счетов',
            'invoice_period' => 'Период выставления счетов',
            'trial_interval' => 'Интервал пробного периода',
            'trial_period' => 'Пробный период',
            'currency' => 'Валюта',
            'is_active' => 'Активен?',
            'day' => 'День',
            'month' => 'Месяц',
            'year' => 'Год',
        ],
    ],
    'features' => [
        'title' => 'Функции',
        'single' => 'Функция',
        'columns' => [
            'name' => 'Название',
            'description' => 'Описание',
            'value' => 'Значение',
            'resettable_interval' => 'Интервал сброса',
            'resettable_period' => 'Период сброса',
            'day' => 'День',
            'month' => 'Месяц',
            'year' => 'Год',
        ],
    ],
    'subscriptions' => [
        'title' => 'Подписки',
        'sections' => [
            'subscriber' => [
                'title' => 'Подписчик',
                'description' => 'Настройки подписчика',
                'columns' => [
                    'subscriber_type' => 'Тип подписчика',
                    'subscriber' => 'Подписчик',
                ],
            ],
            'plan' => [
                'title' => 'План',
                'description' => 'Настройки плана',
                'columns' => [
                    'plan' => 'План',
                    'use_custom_dates' => 'Использовать пользовательские даты',
                ],
            ],
            'custom_dates' => [
                'title' => 'Использовать пользовательские даты',
                'description' => 'Настройки пользовательских дат',
                'columns' => [
                    'trial_ends_at' => 'Пробный период заканчивается',
                    'starts_at' => 'Начинается',
                    'ends_at' => 'Заканчивается',
                    'canceled_at' => 'Отменена',
                ],
            ],
        ],
        'columns' => [
            'active' => 'Активна',
            'subscriber' => 'Подписчик',
            'plan' => 'План',
            'trial_ends_at' => 'Пробный период заканчивается',
            'starts_at' => 'Начинается',
            'ends_at' => 'Заканчивается',
            'canceled_at' => 'Отменена',
            'currency' => 'Валюта',
        ],
        'filters' => [
            'date_range' => 'Диапазон дат',
            'start_date' => 'Дата начала',
            'end_date' => 'Дата окончания',
            'canceled' => 'Отменена',
            'all' => 'Все',
            'yes' => 'Да',
            'no' => 'Нет',
        ],
        'actions' => [
            'cancel' => 'Отменить',
            'renew' => 'Продлить',
        ],
    ],
    'notifications' => [
        'invalid' => [
            'title' => 'Ошибка',
            'message' => 'Выбран недействительный план.',
        ],
        'info' => [
            'title' => 'Информация',
            'message' => 'Вы уже подписаны на этот план.',
        ],
        'renew' => [
            'title' => 'Успешно',
            'message' => 'Подписка успешно продлена.',
        ],
        'change' => [
            'title' => 'Успешно',
            'message' => 'План подписки успешно изменен.',
        ],
        'subscription' => [
            'title' => 'Успешно',
            'message' => 'Подписка оформлена успешно.',
        ],
        'no_active' => [
            'title' => 'Ошибка',
            'message' => 'Нет активной подписки.',
        ],
        'cancel' => [
            'title' => 'Успешно',
            'message' => 'Ваша подписка была успешно отменена.',
        ],
        'cancel_invalid' => [
            'title' => 'Ошибка',
            'message' => 'Произошла ошибка при отмене вашей подписки.',
        ],
    ],
    'view' => [
        'billing_management' => 'Управление счетами',
        'signed_in_as' => 'Вошли как',
        'managing_billing_for' => 'Управление счетами для',
        'our_billing_management' => 'Наш портал управления счетами позволяет вам удобно управлять планом подписки, способом оплаты и загружать последние счета.',
        'subscribe' => 'Подписаться',
        'trial' => 'пробный период',
        'free' => 'Бесплатно',
        'current_subscription' => 'Текущая подписка',
        'renew_subscription' => 'Продлить подписку',
        'change_subscription' => 'Изменить подписку',
        'cancel_subscription' => 'Отменить подписку',
        'resubscribe' => 'Переподписаться',
        'cancel_subscription_info' => 'Вы можете отменить подписку в любое время. После отмены подписки у вас будет возможность использовать подписку до конца текущего расчетного периода.',
        'no_plans_available' => 'Нет доступных планов',
        'return_to' => 'Вернуться к редактированию компании',
        'it_looks_like_no_active_subscription' => 'Похоже, у вас нет активной подписки. Вы можете выбрать один из планов подписки ниже, чтобы начать. Планы подписки можно изменить или отменить в любое удобное время.',
    ],
    'menu' => 'Управление подписками',
];
