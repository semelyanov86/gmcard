<?php

declare(strict_types=1);

namespace App\Enums;

enum JobStatusType: string
{
    case EMPLOYED = 'Трудоустроен';
    case SELF_EMPLOYED = 'Самозанятый';
    case FREELANCER = 'Фрилансер';
}
