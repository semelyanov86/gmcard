<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Support\Facades\DB;

final readonly class ProhibitDestructiveCommands implements ConfigurableInterface
{
    public function enabled(): bool
    {
        return true;
    }

    /**
     * Run the configurable.
     */
    public function configure(): void
    {
        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );
    }
}
