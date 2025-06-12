<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

interface ConfigurableInterface
{
    public function enabled(): bool;

    public function configure(): void;
}
