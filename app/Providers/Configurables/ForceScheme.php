<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Support\Facades\URL;

final readonly class ForceScheme implements ConfigurableInterface
{
    /**
     * Whether the configurable is enabled or not.
     */
    public function enabled(): bool
    {
        return ! app()->isLocal();
    }

    /**
     * Run the configurable.
     */
    public function configure(): void
    {
        URL::forceHttps();
    }
}
