<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Contracts\VtigerCrmInterface;
use App\Data\VtigerContactData;
use App\Data\VtigerPotentialData;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Events\Attributes\ListensTo;
use Illuminate\Support\Facades\Log;
use Salaros\Vtiger\VTWSCLib\WSException;

#[ListensTo(Registered::class)]
final readonly class SendUserToVtigerListener implements ShouldHandleEventsAfterCommit
{
    public function __construct(
        private VtigerCrmInterface $crm
    ) {}

    public function handle(Registered $event): void
    {
        $user = $event->user;

        try {
            $nameParts = explode(' ', $user->name, 2);
            $firstname = $nameParts[0] ?? $user->name;
            $lastname = $nameParts[1] ?? '';

            $contactData = new VtigerContactData(
                firstname: $firstname,
                lastname: $lastname,
                email: $user->email,
                assigned_user_id: '19x6',
                leadsource: 'Website',
            );

            $contact = $this->crm->createContact($contactData);
            $contactId = $contact['id'] ?? null;

            if ($contactId) {
                $potentialData = new VtigerPotentialData(
                    potentialname: "Регистрация: {$user->name}",
                    sales_stage: 'Prospecting',
                    assigned_user_id: '19x6',
                    leadsource: 'Website',
                    closingdate: now()->addDays(30)->format('Y-m-d'),
                );

                $this->crm->createPotential($potentialData);
            }

            Log::info('User synced to Vtiger', [
                'user_id' => $user->id,
                'contact_id' => $contactId,
            ]);
        } catch (WSException $e) {
            Log::error('Failed to sync user to Vtiger', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}

