<?php

declare(strict_types=1);

use Carbon\CarbonImmutable;

if (! function_exists('config_string')) {
    /**
     * @return non-empty-string
     */
    function config_string(string $key, ?string $default = null): string
    {
        /** @var ?string $result */
        $result = config($key, $default);
        if (! $result) {
            throw new InvalidArgumentException('Wrong config param for key '.$key);
        }

        return $result;
    }
}

if (! function_exists('config_int')) {
    /**
     * @return positive-int
     */
    function config_int(string $key, ?int $default = null): int
    {
        /** @var ?int $result */
        $result = config($key, $default);
        if (! $result || $result < 1) {
            throw new InvalidArgumentException('Wrong config param for key '.$key);
        }

        return $result;
    }
}

if (! function_exists('convert_to_carbon')) {
    function convert_to_carbon(string $dateString): ?CarbonImmutable
    {
        $months = [
            'января' => 1, 'февраля' => 2, 'марта' => 3,
            'апреля' => 4, 'мая' => 5, 'июня' => 6,
            'июля' => 7, 'августа' => 8, 'сентября' => 9,
            'октября' => 10, 'ноября' => 11, 'декабря' => 12,
        ];

        $dateData = explode(' ', $dateString);
        if (count($dateData) < 4) {
            return null;
        }
        $hoursData = explode(':', $dateData[3]);

        if (count($hoursData) < 2) {
            return null;
        }

        return CarbonImmutable::create(
            (int) $dateData[2],                     // Год
            $months[$dateData[1]] ?? 1,       // Месяц
            (int) $dateData[0],                     // День
            (int) $hoursData[0],                     // Часы
            (int) $hoursData[1]                      // Минуты
        );
    }
}

if (! function_exists('jsonDecode')) {
    /**
     * @return array<string, mixed>
     */
    function jsonDecode(?string $data): array
    {
        if (! $data) {
            return [];
        }
        /** @var array<string, mixed>|false $result */
        $result = json_decode($data, true);
        if (! $result) {
            return [];
        }

        return $result;
    }
}

if (! function_exists('formatCurrency')) {
    function formatCurrency(int $value): string
    {
        return Number::currency($value / 100, 'RUB', 'ru-RU').'';
    }
}
