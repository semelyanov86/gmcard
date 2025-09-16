<?php

declare(strict_types=1);

namespace App\Enums;

enum JobStatus: string
{
    case EMPLOYED = 'трудоустроен';
    case SELF_EMPLOYED = 'самозанятый';
    case FREELANCER = 'фрилансер';
} 