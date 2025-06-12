<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Database\Eloquent\Model;

final readonly class ShouldBeStrict implements ConfigurableInterface
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
        Model::shouldBeStrict();
    }
}
