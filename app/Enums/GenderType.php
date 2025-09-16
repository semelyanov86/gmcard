<?php

declare(strict_types=1);

namespace App\Enums;

enum GenderType: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    case OTHER = 'other';
}
