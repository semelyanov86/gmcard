<?php
declare(strict_types=1);
namespace App\Http\Controllers\Auth;
use App\Actions\Auth\ResolveYandexUserAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
final class YandexAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('yandex')->redirect();
    }
    public function callback(): RedirectResponse
    {
        $yandexUser = Socialite::driver('yandex')->stateless()->user();
        $yandexId = $yandexUser->getId();
        $email = $yandexUser->getEmail();
        $name = $yandexUser->getName() ?? 'Yandex User';
        if ($yandexId === '' || $email === null || $email === '') {
            return to_route('register');
        }
        $user = ResolveYandexUserAction::run($yandexId, $email, $name);
        Auth::login($user);
        request()->session()->regenerate();
        return redirect()->intended(route('dashboard', absolute: false));
    }
}
