<?php

declare(strict_types=1);

namespace App\Enums;

enum GenderType: string
{
    case MALE = 'Мужской';
    case FEMALE = 'Женский';
    case OTHER = 'Другой';

    /**
     * @return array<string,string>
     */
    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}
