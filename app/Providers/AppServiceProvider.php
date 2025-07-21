<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\VtigerCrmInterface;
use App\Providers\Configurables\ConfigurableInterface;
use App\Services\CRM\VtigerCrmAdapter;
use Illuminate\Support\ServiceProvider;
use Override;

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
    #[Override]
    public function register(): void
    {
        $this->app->bind(VtigerCrmInterface::class, VtigerCrmAdapter::class);
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
