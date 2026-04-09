<?php

declare(strict_types=1);

namespace Tests;

use Database\Seeders\PromoTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Override;

abstract class PromoDatabaseTestCase extends TestCase
{
    use RefreshDatabase;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PromoTypeSeeder::class);
    }
}
