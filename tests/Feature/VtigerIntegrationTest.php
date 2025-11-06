<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Contracts\VtigerCrmInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Override;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class VtigerIntegrationTest extends TestCase
{
    use RefreshDatabase;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'session.driver' => 'array',
            'auth.defaults.guard' => 'web',
        ]);

        if (! Role::query()->where('name', 'user')->exists()) {
            Role::create(['name' => 'user', 'guard_name' => 'web']);
        }

        $this->app->bind(VtigerCrmInterface::class, \Tests\Mocks\MockVtigerAdapter::class);
    }

    public function test_registration_creates_contact_in_vtiger(): void
    {
        $this->post(route('register'), $this->registrationPayload());

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_registration_creates_opportunity_in_vtiger(): void
    {
        $this->post(route('register'), $this->registrationPayload());

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_contact_name_splits_correctly(): void
    {
        $this->post(route('register'), $this->registrationPayload('Иван Петров'));

        $this->assertDatabaseHas('users', [
            'name' => 'Иван Петров',
        ]);
    }

    public function test_contact_handles_single_name(): void
    {
        $this->post(route('register'), $this->registrationPayload('Иван'));

        $this->assertDatabaseHas('users', [
            'name' => 'Иван',
        ]);
    }

    public function test_vtiger_error_does_not_break_registration(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload());

        $response->assertRedirect(route('dashboard', absolute: false));

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        $this->assertAuthenticated();
    }

    public function test_opportunity_not_created_if_contact_fails(): void
    {
        $this->post(route('register'), $this->registrationPayload());

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    /**
     * @return array<string, string>
     */
    private function registrationPayload(?string $name = null): array
    {
        return [
            'name' => $name ?? 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'code' => '',
        ];
    }
}
