<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Support\Facades\Vite;

final readonly class AggressivePrefetching implements ConfigurableInterface
{
    public function enabled(): bool
    {
        return true;
    }

    public function configure(): void
    {
        Vite::useAggressivePrefetching();
    }
}
