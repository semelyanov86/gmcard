<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Actions\User\SendUserToVtigerAction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class SendUserToVtigerJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        protected int $userId
    ) {}

    public function handle(): void
    {
        $user = User::find($this->userId);

        if ($user) {
            SendUserToVtigerAction::run($user);
        }
    }
}
