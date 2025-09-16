<?php

declare(strict_types=1);

namespace App\Enums;

enum JobStatusType: string
{
    case EMPLOYED = 'трудоустроен';
    case SELF_EMPLOYED = 'самозанятый';
    case FREELANCER = 'фрилансер';
}
