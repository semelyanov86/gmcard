<?php

declare(strict_types=1);

namespace App\Providers\Configurables;

use Illuminate\Database\Eloquent\Model;

final readonly class AutomaticallyEagerLoadRelationships implements ConfigurableInterface
{
    public function __construct(
        private string $modelClass = Model::class
    ) {}

    /**
     * Whether the configurable is enabled or not.
     */
    public function enabled(): bool
    {
        return config()->boolean(sprintf('essentials.%s', self::class), true);
    }

    /**
     * Run the configurable.
     */
    public function configure(): void
    {
        if (! method_exists($this->modelClass, 'automaticallyEagerLoadRelationships')) {
            return;
        }

        Model::automaticallyEagerLoadRelationships();
    }
}
