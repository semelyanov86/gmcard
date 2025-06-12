<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Support\Sleep;

final readonly class FakeSleep implements ConfigurableInterface
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
        Sleep::fake();
    }
}
