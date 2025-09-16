<?php

declare(strict_types=1);

namespace App\Enums;

enum OwnerRoleType: string
{
    case OWNER = 'owner';
    case MANAGER = 'manager';
    case SECRETARY = 'secretary';
    case OTHER = 'other';
}
