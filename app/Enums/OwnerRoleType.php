<?php

declare(strict_types=1);

namespace App\Enums;

enum OwnerRoleType: string
{
    case OWNER = 'Владелец';
    case MANAGER = 'Менеджер';
    case SECRETARY = 'Секретарь';
    case OTHER = 'Другое';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}
