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

class YandexAuthTest extends TestCase
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

    public function test_yandex_redirect_route_redirects_to_provider(): void
    {
        Socialite::fake('yandex');

        $response = $this->get(route('auth.yandex.redirect'));

        $response->assertRedirect();
    }

    public function test_yandex_callback_creates_new_user_and_runs_registration_side_effects(): void
    {
        Event::fake([Registered::class]);
        Queue::fake();
        config(['bonus.registration_bonus' => 100]);

        Socialite::fake('yandex', $this->makeFakeYandexUser(
            id: 'yandex-100',
            email: 'new-yandex-user@example.com',
            name: 'Yandex User',
        ));

        $response = $this->get(route('auth.yandex.callback'));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticated();

        $user = User::query()->where('email', 'new-yandex-user@example.com')->first();
        $this->assertNotNull($user);
        $this->assertSame('yandex-100', $user->yandex_id);
        $this->assertTrue($user->hasRole('user'));
        $this->assertSame(100, $user->bonus_balance);

        Event::assertDispatched(Registered::class);
        Queue::assertPushed(SendUserToVtigerJob::class);
    }

    public function test_yandex_callback_links_yandex_id_for_existing_user_found_by_email(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'email' => 'existing@example.com',
            'yandex_id' => null,
        ]);

        Socialite::fake('yandex', $this->makeFakeYandexUser(
            id: 'yandex-200',
            email: 'existing@example.com',
            name: 'Existing User',
        ));

        $response = $this->get(route('auth.yandex.callback'));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user);

        $user->refresh();
        $this->assertSame('yandex-200', $user->yandex_id);
    }

    public function test_yandex_callback_logs_in_existing_user_found_by_yandex_id_without_creating_duplicate(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'email' => 'already-linked@example.com',
            'yandex_id' => 'yandex-300',
        ]);

        Socialite::fake('yandex', $this->makeFakeYandexUser(
            id: 'yandex-300',
            email: 'other-email@example.com',
            name: 'Existing Linked User',
        ));

        $response = $this->get(route('auth.yandex.callback'));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user);
        $this->assertSame(1, User::query()->where('yandex_id', 'yandex-300')->count());
    }

    public function test_yandex_callback_redirects_back_to_register_if_yandex_returns_invalid_required_fields(): void
    {
        Socialite::fake('yandex', $this->makeFakeYandexUser(
            id: '',
            email: '',
            name: 'No Data User',
        ));

        $response = $this->get(route('auth.yandex.callback'));

        $response->assertRedirect(route('register'));
        $this->assertGuest();
    }

    private function makeFakeYandexUser(string $id, string $email, string $name): SocialiteUser
    {
        return (new SocialiteUser())->map([
            'id' => $id,
            'email' => $email,
            'name' => $name,
        ]);
    }
}
