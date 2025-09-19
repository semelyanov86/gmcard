<?php

declare(strict_types=1);

namespace App\Enums;

enum OwnerRoleType: string
{
    case OWNER = 'Владелец';
    case MANAGER = 'Менеджер';
    case SECRETARY = 'Секретарь';
    case OTHER = 'Другое';
}
