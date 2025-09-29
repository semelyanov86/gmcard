<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReceiveContactsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle($job, array $data): void
    {
        $map = [
            'firstname' => 'name',
            'lastname' => 'last_name',
            'email' => 'email',
        ];

        $incoming = $data['data'] ?? [];
        $crmid = (string)($incoming['id'] ?? '');
        if ($crmid === '') return;

        $user = User::firstOrNew(['crmid' => $crmid]);

        $filtered = array_intersect_key($incoming, $map);

        $toUpdate = [];
        foreach ($filtered as $src => $value) {
            $toUpdate[$map[$src]] = $value;
        }

        if (!$user->exists && !array_key_exists('email', $toUpdate)) {
            $toUpdate['email'] = 'no-email+' . $crmid . '@example.com';
        }

        $user->fill($toUpdate);

        if (!$user->exists && empty($user->password)) {
            $user->password = bcrypt('123456');
        }

        if ($user->isDirty()) {
            $user->save();
        }
    }
}
