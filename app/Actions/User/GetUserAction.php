<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Data\UserData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static UserData run(int $id)
 */
final readonly class GetUserAction
{
    use AsAction;

    public function handle(int $id): UserData
    {
        $user = User::query()
            ->with('roles')
            ->findOrFail($id);

        /** @var \Illuminate\Support\Carbon|null $birthDate */
        $birthDate = $user->birth_date;
        /** @var \Spatie\Permission\Models\Role|null $role */
        $role = $user->roles->first();

        return UserData::from([
            'name' => $user->name,
            'email' => $user->email,
            'password' => '',
            'last_name' => $user->last_name,
            'age' => $user->age,
            'id' => $user->id,
            'balance' => $user->getRawOriginal('balance'),
            'virtual_balance' => $user->virtual_balance,
            'job' => $user->job,
            'job_status' => $user->job_status,
            'city' => $user->city,
            'country' => $user->country,
            'birth_date' => $birthDate?->format('Y-m-d'),
            'role' => $role?->name,
            'gender' => $user->gender,
            'code' => $user->code,
        ]);
    }
}
