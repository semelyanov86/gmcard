<?php

declare(strict_types=1);

namespace App\Enums;

enum OwnerRole: string
{
    case OWNER = 'owner';
    case MANAGER = 'manager';
    case SECRETARY = 'secretary';
    case OTHER = 'other';
} 