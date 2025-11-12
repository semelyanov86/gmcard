<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TwoFactorAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_two_factor_authentication_can_be_enabled(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/two-factor-authentication');

        $response->assertSessionHasNoErrors();
        $this->assertNotNull($user->fresh()->two_factor_secret);
        $this->assertNotNull($user->fresh()->two_factor_recovery_codes);
    }

    public function test_two_factor_authentication_requires_authentication(): void
    {
        $response = $this->post('/user/two-factor-authentication');

        $response->assertRedirect(route('login'));
    }

    public function test_qr_code_can_be_retrieved(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this->actingAs($user)->post('/user/two-factor-authentication');

        $response = $this->actingAs($user)->get('/user/two-factor-qr-code');

        $response->assertStatus(200);
        $response->assertJsonStructure(['svg']);
    }

    public function test_secret_key_can_be_retrieved(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this->actingAs($user)->post('/user/two-factor-authentication');

        $response = $this->actingAs($user)->get('/user/two-factor-secret-key');

        $response->assertStatus(200);
        $response->assertJsonStructure(['secretKey']);
    }

    public function test_recovery_codes_can_be_retrieved(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this->actingAs($user)->post('/user/two-factor-authentication');

        $response = $this->actingAs($user)->get('/user/two-factor-recovery-codes');

        $response->assertStatus(200);
        $response->assertJsonIsArray();
    }

    public function test_two_factor_authentication_can_be_disabled(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this->actingAs($user)->post('/user/two-factor-authentication');
        $this->assertNotNull($user->fresh()->two_factor_secret);

        $response = $this->actingAs($user)->delete('/user/two-factor-authentication');

        $response->assertSessionHasNoErrors();
        $user = $user->fresh();
        $this->assertNull($user->two_factor_secret);
        $this->assertNull($user->two_factor_recovery_codes);
        $this->assertNull($user->two_factor_confirmed_at);
    }

    public function test_recovery_codes_can_be_regenerated(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this->actingAs($user)->post('/user/two-factor-authentication');
        $oldRecoveryCodes = $user->fresh()->two_factor_recovery_codes;

        $response = $this->actingAs($user)->post('/user/two-factor-recovery-codes');

        $response->assertSessionHasNoErrors();
        $newRecoveryCodes = $user->fresh()->two_factor_recovery_codes;
        $this->assertNotEquals($oldRecoveryCodes, $newRecoveryCodes);
        $this->assertNotNull($newRecoveryCodes);
    }

    public function test_two_factor_challenge_page_can_be_accessed(): void
    {
        $response = $this->get(route('two-factor.login'));

        $response->assertStatus(200);
    }

    public function test_user_without_two_factor_can_login_normally(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }
}

