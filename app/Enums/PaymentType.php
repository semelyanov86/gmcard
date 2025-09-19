<?php

declare(strict_types=1);

namespace App\Enums;

enum PaymentType: string
{
    case INCOMING = 'Поступление';
    case OUTGOING = 'Списание';
}
