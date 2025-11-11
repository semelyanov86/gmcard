<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Jobs\SendUserToVtigerJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class VtigerIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_dispatches_vtiger_job(): void
    {
        Queue::fake();

        $this->post(route('register'), $this->registrationPayload());

        Queue::assertPushed(SendUserToVtigerJob::class);
    }

    public function test_vtiger_job_stores_crmid(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload());

        $response->assertRedirect(route('dashboard', absolute: false));

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'crmid' => '12x456',
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
