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
final readonly class ResolveYandexUserAction
{
    use AsAction;

    public function handle(string $yandexId, string $email, string $name): User
    {
        $isNewUser = false;

        $user = User::query()
            ->where('yandex_id', $yandexId)
            ->orWhere('email', $email)
            ->first();

        if (! $user) {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'yandex_id' => $yandexId,
                'password' => Str::password(32),
            ]);
            $isNewUser = true;
        } elseif (! $user->yandex_id) {
            $user->update(['yandex_id' => $yandexId]);
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
