<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Support\Facades\Http;

class PreventStrayRequests implements ConfigurableInterface
{
    public function enabled(): bool
    {
        $testing = app()->runningUnitTests();

        return $testing;
    }

    /**
     * Run the configurable.
     */
    public function configure(): void
    {
        Http::preventStrayRequests();
    }
}
