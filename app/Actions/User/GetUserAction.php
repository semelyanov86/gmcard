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

        return UserData::fromModel($user);
    }
}
