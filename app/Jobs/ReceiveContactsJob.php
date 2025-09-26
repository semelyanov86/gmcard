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
        $contactData = $data['data'];

        $mappedData = [
            'crmid' => $contactData['id'],
            'name' => $contactData['firstname'] ?? null,
            'last_name' => $contactData['lastname'] ?? null,
            'email' => $contactData['email'] ?? 'no-email@example.com',
        ];

        User::firstOrCreate(
            ['crmid' => $mappedData['crmid']],
            $mappedData
        );
    }
}
