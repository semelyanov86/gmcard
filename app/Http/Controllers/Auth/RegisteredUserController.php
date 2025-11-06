<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\CreditBonusBalanceAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

final class RegisteredUserController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('auth/AuthPage', [
            'initialTab' => 'register',
            'canResetPassword' => true,
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisteredUserRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->string('name')->toString(),
            'email' => $request->string('email')->toString(),
            'password' => Hash::make($request->string('password')->toString()),
            'code' => $request->string('code')->toString(),
        ]);

        $user->assignRole('user');

        $registrationBonus = config('bonus.registration_bonus');
        if (is_numeric($registrationBonus)) {
            CreditBonusBalanceAction::run($user->id, (int) $registrationBonus);
        }

        event(new Registered($user));

        Auth::login($user);

        return to_route('dashboard');
    }
}
