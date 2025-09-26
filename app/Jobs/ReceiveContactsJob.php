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
        $contactData['crmid'] = $contactData['id'];
        
        if (isset($contactData['firstname'])) {
            $contactData['name'] = $contactData['firstname'];
        }
        if (isset($contactData['lastname'])) {
            $contactData['last_name'] = $contactData['lastname'];
        }

        User::updateOrCreate(
            ['crmid' => $contactData['crmid']],
            $contactData
        );
    }
}
