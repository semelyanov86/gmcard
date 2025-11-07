<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Contracts\VtigerCrmInterface;
use App\Data\VtigerContactData;
use App\Data\VtigerPotentialData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

/**
 * @method static void run(User $user)
 */
final readonly class SendUserToVtigerAction
{
    use AsAction;

    public function __construct(
        protected VtigerCrmInterface $crm
    ) {}

    public function handle(User $user): void
    {
        try {
            $nameParts = explode(' ', $user->name, 2);
            $firstname = $nameParts[0];
            $lastname = $nameParts[1] ?? '';

            $contactData = new VtigerContactData(
                firstname: $firstname,
                lastname: $lastname,
                email: $user->email,
                assigned_user_id: '19x6',
                leadsource: 'Website',
            );

            $this->crm->createContact($contactData);

            $contactId = $this->crm->findContactByEmail($user->email);

            if ($contactId) {
                $user->update(['crmid' => $contactId]);

                $this->crm->createPotential(new VtigerPotentialData(
                    potentialname: "Регистрация: {$user->name}",
                    sales_stage: 'Prospecting',
                    contact_id: $contactId,
                    assigned_user_id: '19x6',
                    leadsource: 'Website',
                    closingdate: now()->addDays(30)->format('Y-m-d'),
                ));
            }
        } catch (Throwable $e) {
            report($e);
        }
    }
}
