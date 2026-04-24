<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Actions\CreditBonusBalanceAction;
use App\Jobs\SendUserToVtigerJob;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static User run(string $googleId, string $email, string $name)
 */
final readonly class ResolveGoogleUserAction
{
    use AsAction;

    public function handle(string $googleId, string $email, string $name): User
    {
        $isNewUser = false;

        $user = User::query()
            ->where('google_id', $googleId)
            ->orWhere('email', $email)
            ->first();

        if (! $user) {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'google_id' => $googleId,
                'password' => Str::password(32),
            ]);
            $isNewUser = true;
        } elseif (! $user->google_id) {
            $user->update(['google_id' => $googleId]);
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

        return $user;
    }
}
