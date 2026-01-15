<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Override;

class RegistrationTest extends TestCase
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

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get(route('register'));

        $response->assertOk();
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload());

        $response->assertRedirect(route('register'));
        $response->assertSessionHas('status');
        $this->assertAuthenticated();
    }

    public function test_new_users_can_register_with_code(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload('PROMO2024'));

        $response->assertRedirect(route('register'));

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'code' => 'PROMO2024',
        ]);
    }

    public function test_registration_assigns_user_role(): void
    {
        $this->post(route('register'), $this->registrationPayload());

        $user = User::where('email', 'test@example.com')->first();

        $this->assertNotNull($user);
        $this->assertTrue($user->hasRole('user'));
    }

    public function test_registration_logs_user_in_automatically(): void
    {
        $this->post(route('register'), $this->registrationPayload());

        $this->assertAuthenticated();
    }

    public function test_registration_dispatches_registered_event(): void
    {
        Event::fake();

        $this->post(route('register'), $this->registrationPayload());

        Event::assertDispatched(Registered::class);
    }

    public function test_registration_hashes_password(): void
    {
        $this->post(route('register'), $this->registrationPayload(null, [
            'password' => 'my-secure-password',
            'password_confirmation' => 'my-secure-password',
        ]));

        $user = User::where('email', 'test@example.com')->first();

        $this->assertNotNull($user);
        $this->assertNotEquals('my-secure-password', $user->password);
        $this->assertTrue(Hash::check('my-secure-password', $user->password));
    }

    public function test_email_must_be_lowercase(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload(null, [
            'email' => 'TEST@EXAMPLE.COM',
        ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_lowercase_email_is_accepted(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload());

        $response->assertRedirect(route('register'));
        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_registration_requires_name(): void
    {
        $response = $this->post(route('register'), [
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
        $this->assertGuest();
    }

    public function test_registration_requires_email(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_registration_requires_valid_email(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload(null, [
            'email' => 'not-a-valid-email',
        ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_registration_requires_unique_email(): void
    {
        User::factory()->create([
            'email' => 'test@example.com',
        ]);

        $response = $this->post(route('register'), $this->registrationPayload());

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_registration_requires_password(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_registration_requires_password_confirmation(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_registration_requires_matching_password_confirmation(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload(null, [
            'password_confirmation' => 'different-password',
        ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_name_must_not_exceed_255_characters(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload(null, [
            'name' => str_repeat('a', 256),
        ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
        $this->assertGuest();
    }

    public function test_email_must_not_exceed_255_characters(): void
    {
        $longEmail = str_repeat('a', 244) . '@example.com';

        $response = $this->post(route('register'), $this->registrationPayload(null, [
            'email' => $longEmail,
        ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_code_is_optional(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload());

        $response->assertRedirect(route('register'));
        $this->assertAuthenticated();
    }

    public function test_code_must_not_exceed_20_characters(): void
    {
        $response = $this->post(route('register'), $this->registrationPayload(str_repeat('a', 21)));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('code');
        $this->assertGuest();
    }

    public function test_authenticated_users_cannot_access_registration_page(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('register'));

        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_authenticated_users_cannot_register(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('register'), $this->registrationPayload(null, [
            'name' => 'Another User',
            'email' => 'another@example.com',
        ]));

        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_registration_credits_bonus_balance(): void
    {
        config(['bonus.registration_bonus' => 100]);

        $this->post(route('register'), $this->registrationPayload('TEST123'));

        $user = User::where('email', 'test@example.com')->first();

        $this->assertNotNull($user);
        $this->assertEquals(100, $user->bonus_balance);
    }

    public function test_registration_handles_zero_bonus_config(): void
    {
        config(['bonus.registration_bonus' => 0]);

        $this->post(route('register'), $this->registrationPayload('TEST456', [
            'email' => 'test2@example.com',
        ]));

        $user = User::where('email', 'test2@example.com')->first();

        $this->assertNotNull($user);
        $this->assertEquals(0, $user->bonus_balance);
    }

    public function test_registration_handles_invalid_bonus_config(): void
    {
        config(['bonus.registration_bonus' => 'invalid']);

        $this->post(route('register'), $this->registrationPayload('TEST789', [
            'email' => 'test3@example.com',
        ]));

        $user = User::where('email', 'test3@example.com')->first();

        $this->assertNotNull($user);
        $this->assertEquals(0, $user->bonus_balance);
    }

    /**
     * @param  array<string, string>  $overrides
     * @return array<string, string>
     */
    private function registrationPayload(?string $code = null, array $overrides = []): array
    {
        $payload = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        if ($code !== null) {
            $payload['code'] = $code;
        }

        return array_replace($payload, $overrides);
    }
}
