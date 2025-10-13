<?php

declare(strict_types=1);

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppearanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_appearance_settings(): void
    {
        $response = $this->get('/settings/appearance');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_users_can_access_appearance_settings(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/settings/appearance');

        $response->assertStatus(200);
    }

    public function test_appearance_page_renders_correct_component(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/settings/appearance');

        $response->assertStatus(200);
        $response->assertInertia(
            fn ($page) => $page
                ->component('settings/Appearance')
        );
    }
}
