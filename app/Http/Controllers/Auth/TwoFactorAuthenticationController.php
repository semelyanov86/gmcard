<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;
use Laravel\Fortify\Events\RecoveryCodeReplaced;

class TwoFactorAuthenticationController extends Controller
{
    public function create(Request $request): Response
    {
        return Inertia::render('auth/TwoFactorLogin');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = $this->challengedUser($request);

        if (is_null($user)) {
            throw ValidationException::withMessages([
                'code' => [trans('auth.failed')],
            ]);
        }

        if ($request->filled('code')) {
            $isValid = app(TwoFactorAuthenticationProvider::class)->verify(
                decrypt($user->two_factor_secret),
                $request->code
            );

            if (! $isValid) {
                throw ValidationException::withMessages([
                    'code' => ['Введённый код неверный.'],
                ]);
            }
        } elseif ($request->filled('recovery_code')) {
            $isValid = $this->validRecoveryCode($user, $request->recovery_code);

            if (! $isValid) {
                throw ValidationException::withMessages([
                    'recovery_code' => ['Введённый код восстановления неверный.'],
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'code' => ['Пожалуйста, введите код аутентификации или код восстановления.'],
            ]);
        }

        Auth::login($user, $request->session()->pull('login.remember', false));

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    protected function challengedUser(Request $request): ?User
    {
        if ($userId = $request->session()->get('login.id')) {
            return User::find($userId);
        }

        return null;
    }

    protected function validRecoveryCode(User $user, string $code): bool
    {
        $recoveryCodes = json_decode(decrypt($user->two_factor_recovery_codes), true);

        if (! is_array($recoveryCodes)) {
            return false;
        }

        if (! in_array($code, $recoveryCodes)) {
            return false;
        }

        $user->replaceRecoveryCode($code);

        event(new RecoveryCodeReplaced($user, $code));

        return true;
    }
}
