<?php

declare(strict_types=1);

namespace Tests;

use App\Contracts\VtigerCrmInterface;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Schema;
use Override;
use Spatie\Permission\Models\Role;
use Tests\Mocks\MockVtigerAdapter;

abstract class TestCase extends BaseTestCase
{
    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();

        $this->app->bind(VtigerCrmInterface::class, MockVtigerAdapter::class);

        if (Schema::hasTable('roles')) {
            Role::firstOrCreate(
                ['name' => 'user', 'guard_name' => 'web']
            );
        }
    }
}
