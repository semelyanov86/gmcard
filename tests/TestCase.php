<?php

declare(strict_types=1);

namespace Tests;

use App\Contracts\VtigerCrmInterface;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Mocks\MockVtigerAdapter;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(VtigerCrmInterface::class, MockVtigerAdapter::class);
    }
}
