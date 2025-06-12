<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Validation\Rules\Password;

final readonly class SetDefaultPassword implements ConfigurableInterface
{
    public function enabled(): bool
    {
        return true;
    }

    public function configure(): void
    {
        Password::defaults(fn (): ?Password => app()->isProduction() ? Password::min(12)->max(255)->uncompromised() : null);
    }
}
