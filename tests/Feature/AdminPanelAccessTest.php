<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Override;

class AdminPanelAccessTest extends TestCase
{
    use RefreshDatabase;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => 'super-admin', 'guard_name' => 'web']);
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        Role::create(['name' => 'moderator', 'guard_name' => 'web']);
    }

    public function test_unauthenticated_users_cannot_access_admin_panel(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }

    public function test_unauthenticated_users_cannot_access_admin_panel_with_slash(): void
    {
        $response = $this->get('/admin/');
        $response->assertRedirect('/admin/login');
    }

    public function test_regular_users_cannot_access_admin_panel(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $user->assignRole('user');

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(403);
    }

    public function test_admin_users_can_access_admin_panel(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $user->assignRole('admin');

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_super_admin_users_can_access_admin_panel(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $user->assignRole('super-admin');

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_moderator_users_can_access_admin_panel(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $user->assignRole('moderator');

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_users_cannot_access_admin_subpages(): void
    {
        $adminRoutes = [
            '/admin/addresses',
            '/admin/adv-campaigns',
            '/admin/bonuses',
            '/admin/categories',
            '/admin/cities',
            '/admin/organisations',
            '/admin/payments',
            '/admin/permissions',
            '/admin/promo-usages',
            '/admin/promos',
            '/admin/roles',
            '/admin/subscriptions',
            '/admin/users',
        ];

        foreach ($adminRoutes as $route) {
            $response = $this->get($route);
            $response->assertRedirect('/admin/login');
        }
    }

    public function test_regular_users_cannot_access_admin_subpages(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $user->assignRole('user');

        $adminRoutes = [
            '/admin/addresses',
            '/admin/adv-campaigns',
            '/admin/bonuses',
            '/admin/categories',
            '/admin/cities',
            '/admin/organisations',
            '/admin/payments',
            '/admin/permissions',
            '/admin/promo-usages',
            '/admin/promos',
            '/admin/roles',
            '/admin/subscriptions',
            '/admin/users',
        ];

        foreach ($adminRoutes as $route) {
            $response = $this->actingAs($user)->get($route);
            $response->assertStatus(403);
        }
    }
}
