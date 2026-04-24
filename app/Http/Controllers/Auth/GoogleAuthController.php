<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\ResolveGoogleUserAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

final class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();
        $googleId = $googleUser->getId();
        $email = $googleUser->getEmail();
        $name = $googleUser->getName() ?? 'Google User';

        if ($googleId === '' || $email === null || $email === '') {
            return redirect()->route('register');
        }

        $user = ResolveGoogleUserAction::run($googleId, $email, $name);

        Auth::login($user);
        request()->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
