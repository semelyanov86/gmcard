<?php

declare(strict_types=1);

return [
    'title' => 'Платежи',
    'payments' => [
        'title' => 'Платежи',
        'columns' => [
            'id' => 'ID',
            'transaction_id' => 'ID транзакции',
            'method_name' => 'Название метода',
            'amount' => 'Сумма',
            'conversion' => 'Конверсия',
            'status' => 'Статус',
            'processing' => 'В обработке',
            'completed' => 'Завершено',
            'cancelled' => 'Отменено',
            'initiated' => 'Инициировано',
            'details' => 'Детали',
            'username' => 'Имя пользователя',
            'date' => 'Дата',
            'transaction_number' => 'Номер транзакции',
            'method_code' => 'Код метода',
            'charge' => 'Комиссия',
            'rate' => 'Курс',
            'after_rate_conversion' => 'После конвертации по курсу',
            'name' => 'Имя',
            'email' => 'Email',
            'mobile' => 'Мобильный',
            'address_one' => 'Адрес 1',
            'address_two' => 'Адрес 2',
            'city' => 'Город',
            'sub_city' => 'Пригород',
            'area' => 'Район',
            'state' => 'Штат',
            'postcode' => 'Почтовый индекс',
            'country' => 'Страна',
            'customer' => 'Клиент',
            'shipping' => 'Доставка',
            'billing' => 'Платежная информация',
        ],
    ],
    'payment_gateways' => [
        'title' => 'Платежные шлюзы',
        'back' => 'Назад',
        'edit' => 'Редактировать платежные шлюзы',
        'sections' => [
            'payment_gateway_data' => [
                'title' => 'Данные платежного шлюза',
                'columns' => [
                    'image' => 'Изображение',
                    'name' => 'Название',
                    'description' => 'Описание',
                    'status' => 'Статус',
                ],
            ],
            'gateway_parameters_data' => [
                'title' => 'Данные параметров шлюза',
                'columns' => [
                    'key' => 'Ключ',
                    'value' => 'Значение',
                ],
            ],
            'supported_currencies' => [
                'title' => 'Поддерживаемые валюты',
                'columns' => [
                    'currency' => 'Валюта',
                    'symbol' => 'Символ',
                    'rate' => 'Курс',
                    'minimum_amount' => 'Минимальная сумма',
                    'maximum_amount' => 'Максимальная сумма',
                    'fixed_charge' => 'Фиксированная комиссия',
                    'percent_charge' => 'Процентная комиссия',
                ],
            ],
        ],
        'columns' => [
            'image' => 'Изображение',
            'name' => 'Название',
            'description' => 'Описание',
            'alias' => 'Псевдоним',
            'status' => 'Статус',
            'crypto' => 'Крипто',
            'toggle_status' => 'Переключить статус',
        ],
    ],
    'widgets' => [
        'processing_payments' => [
            'title' => 'Платежи в обработке',
            'description' => 'Общая сумма платежей в обработке',
        ],
        'completed_payments' => [
            'title' => 'Завершенные платежи',
            'description' => 'Общая сумма завершенных платежей',
        ],
        'cancelled_payments' => [
            'title' => 'Отмененные платежи',
            'description' => 'Общая сумма отмененных платежей',
        ],
        'wallet_balance' => [
            'title' => 'Баланс кошелька',
            'description' => 'Текущий баланс кошелька',
        ],
        'total_deposits' => [
            'title' => 'Общая сумма пополнений',
            'description' => 'Общая пополненная сумма',
        ],
        'total_withdrawals' => [
            'title' => 'Общая сумма снятий',
            'description' => 'Общая сумма снятых средств',
        ],
    ],
    'view' => [
        'payment_action' => 'Оплатить',
        'error' => 'Ошибка!',
        'title_pay_page' => 'Оформление заказа / Платежный шлюз',
        'choose_payment_method' => 'Выберите способ оплаты',
        'no_gateways_available' => 'Шлюзы недоступны',
        'amount' => 'Сумма',
        'payment_gateway_fee' => 'Комиссия платежного шлюза',
        'total' => 'Итого',
        'pay_now' => 'Оплатить сейчас',
        'contact_us' => 'Если у вас возникли проблемы с процессом оплаты или вы не получили услугу, свяжитесь с нами напрямую',
        'signed_in_as' => 'Вы вошли как',
        'managing_billing_for' => 'Управление платежами для',
    ],
];
