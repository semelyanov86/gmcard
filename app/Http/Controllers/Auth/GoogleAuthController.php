<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\CreditBonusBalanceAction;
use App\Http\Controllers\Controller;
use App\Jobs\SendUserToVtigerJob;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();
        $isNewUser = false;

        $user = User::query()
            ->where('google_id', $googleUser->id)
            ->orWhere('email', $googleUser->email)
            ->first();

        if (! $user) {
            $user = User::create([
                'name' => $googleUser->name ?: 'Google User',
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Str::password(32),
            ]);
            $isNewUser = true;
        } elseif (! $user->google_id) {
            $user->update(['google_id' => $googleUser->id]);
        }

        if ($isNewUser) {
            $user->assignRole('user');

            $registrationBonus = config('bonus.registration_bonus');
            if (is_numeric($registrationBonus)) {
                CreditBonusBalanceAction::run($user->id, (int) $registrationBonus);
            }

            event(new Registered($user));

            dispatch(new SendUserToVtigerJob($user->id));
        }

        Auth::login($user);
        request()->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
