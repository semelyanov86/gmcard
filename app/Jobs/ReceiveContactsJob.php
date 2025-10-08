<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\User;
use App\Queue\Jobs\RabbitMQJob;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReceiveContactsJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @param  array<string, mixed>  $data
     */
    public function handle(RabbitMQJob $job, array $data): void
    {
        $map = [
            'firstname' => 'name',
            'lastname' => 'last_name',
            'email' => 'email',
        ];

        $incoming = $data['data'] ?? [];
        if (! is_array($incoming)) {
            return;
        }

        $id = $incoming['id'] ?? '';
        if (is_string($id) || is_numeric($id)) {
            $crmid = (string) $id;
        } else {
            $crmid = '';
        }
        if ($crmid === '') {
            return;
        }

        $user = User::firstOrNew(['crmid' => $crmid]);

        $filtered = array_intersect_key($incoming, $map);

        $toUpdate = [];
        foreach ($filtered as $src => $value) {
            $toUpdate[$map[$src]] = $value;
        }

        if (! $user->exists && ! array_key_exists('email', $toUpdate)) {
            $toUpdate['email'] = 'no-email+' . $crmid . '@example.com';
        }

        $user->fill($toUpdate);

        if (! $user->exists && empty($user->password)) {
            $user->password = bcrypt('123456');
        }

        if ($user->isDirty()) {
            $user->save();
        }
    }
}
