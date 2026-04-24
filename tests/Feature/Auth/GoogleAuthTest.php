<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Jobs\SendUserToVtigerJob;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Override;

class GoogleAuthTest extends TestCase
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

        Auth::shouldUse('web');

        if (! Role::query()->where('name', 'user')->exists()) {
            Role::create(['name' => 'user', 'guard_name' => 'web']);
        }
    }

    public function test_google_redirect_route_redirects_to_provider(): void
    {
        Socialite::fake('google');

        $response = $this->get(route('auth.google.redirect'));

        $response->assertRedirect();
    }

    public function test_google_callback_creates_new_user_and_runs_registration_side_effects(): void
    {
        Event::fake([Registered::class]);
        Queue::fake();
        config(['bonus.registration_bonus' => 100]);

        Socialite::fake('google', $this->makeFakeGoogleUser(
            id: 'google-100',
            email: 'new-google-user@example.com',
            name: 'Google User',
        ));

        $response = $this->get(route('auth.google.callback'));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticated();

        $user = User::query()->where('email', 'new-google-user@example.com')->first();
        $this->assertNotNull($user);
        $this->assertSame('google-100', $user->google_id);
        $this->assertTrue($user->hasRole('user'));
        $this->assertSame(100, $user->bonus_balance);

        Event::assertDispatched(Registered::class);
        Queue::assertPushed(SendUserToVtigerJob::class);
    }

    public function test_google_callback_links_google_id_for_existing_user_found_by_email(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'email' => 'existing@example.com',
            'google_id' => null,
        ]);

        Socialite::fake('google', $this->makeFakeGoogleUser(
            id: 'google-200',
            email: 'existing@example.com',
            name: 'Existing User',
        ));

        $response = $this->get(route('auth.google.callback'));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user);

        $user->refresh();
        $this->assertSame('google-200', $user->google_id);
    }

    public function test_google_callback_logs_in_existing_user_found_by_google_id_without_creating_duplicate(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'email' => 'already-linked@example.com',
            'google_id' => 'google-300',
        ]);

        Socialite::fake('google', $this->makeFakeGoogleUser(
            id: 'google-300',
            email: 'other-email@example.com',
            name: 'Existing Linked User',
        ));

        $response = $this->get(route('auth.google.callback'));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user);
        $this->assertSame(1, User::query()->where('google_id', 'google-300')->count());
    }

    public function test_google_callback_redirects_back_to_register_if_google_returns_invalid_required_fields(): void
    {
        Socialite::fake('google', $this->makeFakeGoogleUser(
            id: '',
            email: '',
            name: 'No Data User',
        ));

        $response = $this->get(route('auth.google.callback'));

        $response->assertRedirect(route('register'));
        $this->assertGuest();
    }

    private function makeFakeGoogleUser(string $id, string $email, string $name): SocialiteUser
    {
        return (new SocialiteUser())->map([
            'id' => $id,
            'email' => $email,
            'name' => $name,
        ]);
    }
}
