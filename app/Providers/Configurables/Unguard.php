<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Database\Eloquent\Model;

final readonly class Unguard implements ConfigurableInterface
{
    public function enabled(): bool
    {
        return true;
    }

    public function configure(): void
    {
        Model::unguard();
    }
}
