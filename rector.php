<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/public',
        __DIR__ . '/resources',
        __DIR__ . '/tests',
    ]);

    $rectorConfig->skip([
        RenameClassRector::class => [
            __DIR__ . '/tests/Feature/Promo/CreatePromoRequestTest.php',
        ],
    ]);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    // define sets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_83,
        RectorLaravel\Set\LaravelSetList::LARAVEL_100,
        RectorLaravel\Set\LaravelSetList::LARAVEL_110,
        RectorLaravel\Set\LaravelLevelSetList::UP_TO_LARAVEL_110,
        RectorLaravel\Set\LaravelSetList::LARAVEL_CODE_QUALITY,
        PHPUnitSetList::PHPUNIT_100,
    ]);
};
