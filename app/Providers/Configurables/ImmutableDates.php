<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;

final readonly class ImmutableDates implements ConfigurableInterface
{
    public function enabled(): bool
    {
        return true;
    }

    public function configure(): void
    {
        Date::use(CarbonImmutable::class);
    }
}
