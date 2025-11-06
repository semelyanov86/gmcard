<?php

declare(strict_types=1);

namespace App\Enums\Promo;

enum PromoCostType: string
{
    case FIRST_FREE = 'first_free';
    case WITHIN_LIMIT = 'within_limit';
    case NO_TARIFF = 'no_tariff';
    case BANNER = 'banner';
    case EXTRA = 'extra';
}
