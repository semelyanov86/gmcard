<?php

namespace App\Providers;

use App\Providers\Configurables\ConfigurableInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @var class-string<ConfigurableInterface>[]
     */
    private array $configurables = [
        Configurables\AggressivePrefetching::class,
        Configurables\AutomaticallyEagerLoadRelationships::class,
        Configurables\FakeSleep::class,
        Configurables\ForceScheme::class,
        Configurables\ImmutableDates::class,
        //        Configurables\PreventStrayRequests::class,
        Configurables\ProhibitDestructiveCommands::class,
        Configurables\SetDefaultPassword::class,
        Configurables\ShouldBeStrict::class,
        Configurables\Unguard::class,
    ];

    /**
     * Register any application services.
     */
    #[\Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        collect($this->configurables)
            ->map(fn (string $configurable) => $this->app->make($configurable))
            ->filter(fn (ConfigurableInterface $configurable): bool => $configurable->enabled())
            ->each(fn (ConfigurableInterface $configurable) => $configurable->configure());
    }
}
