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
            $secret = $user->two_factor_secret;
            $code = $request->input('code');

            if (! is_string($secret) || ! is_string($code)) {
                throw ValidationException::withMessages([
                    'code' => ['Код аутентификации недействителен.'],
                ]);
            }

            $decryptedSecret = decrypt($secret);

            if (! is_string($decryptedSecret)) {
                throw ValidationException::withMessages([
                    'code' => ['Код аутентификации недействителен.'],
                ]);
            }

            $isValid = app(TwoFactorAuthenticationProvider::class)->verify(
                $decryptedSecret,
                $code
            );

            if (! $isValid) {
                throw ValidationException::withMessages([
                    'code' => ['Введённый код неверный.'],
                ]);
            }
        } elseif ($request->filled('recovery_code')) {
            $recoveryCode = $request->input('recovery_code');

            if (! is_string($recoveryCode)) {
                throw ValidationException::withMessages([
                    'recovery_code' => ['Код восстановления недействителен.'],
                ]);
            }

            $isValid = $this->validRecoveryCode($user, $recoveryCode);

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

        Auth::login($user, (bool) $request->session()->pull('login.remember', false));

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    protected function challengedUser(Request $request): ?User
    {
        $userId = $request->session()->get('login.id');

        if ($userId) {
            $user = User::find($userId);

            return $user instanceof User ? $user : null;
        }

        return null;
    }

    protected function validRecoveryCode(User $user, string $code): bool
    {
        $encryptedCodes = $user->two_factor_recovery_codes;

        if (! is_string($encryptedCodes)) {
            return false;
        }

        $decryptedCodes = decrypt($encryptedCodes);

        if (! is_string($decryptedCodes)) {
            return false;
        }

        $recoveryCodes = json_decode($decryptedCodes, true);

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
