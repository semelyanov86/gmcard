<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Queue;

final class SendUserToRabbitAction
{
    public function __invoke(User $user): bool
    {
        if (app()->environment('testing')) {
            return true;
        }

        $userData = $user->toArray();
        $userData['module'] = User::CRM_CONTACTS_NAME;

        Queue::connection('rabbitmq')->pushRaw(json_encode($userData, JSON_THROW_ON_ERROR), 'vtcontacts');

        return true;
    }
}
