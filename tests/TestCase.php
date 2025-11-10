<?php

declare(strict_types=1);

namespace Tests;

use App\Contracts\VtigerCrmInterface;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Mocks\MockVtigerAdapter;
use Override;

abstract class TestCase extends BaseTestCase
{
    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(VtigerCrmInterface::class, MockVtigerAdapter::class);
    }
}
