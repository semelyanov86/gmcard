<?php

declare(strict_types=1);

namespace App\Services\CRM;

use App\Contracts\VtigerCrmInterface;
use App\Data\PopUpData;
use App\Data\VtigerContactData;
use App\Data\VtigerPotentialData;
use App\Exceptions\VtigerCrmException;
use Salaros\Vtiger\VTWSCLib\WSClient;
use Throwable;

final readonly class VtigerCrmAdapter implements VtigerCrmInterface
{
    protected WSClient $client;

    public function __construct()
    {
        $url = config_string('services.vtiger.url');
        $username = config_string('services.vtiger.username');
        $accessKey = config_string('services.vtiger.access_key');


        $this->client = new WSClient($url, $username, $accessKey);
    }

    /**
     * @return array<string, scalar>
     * @throws VtigerCrmException
     */
    public function createLead(PopUpData $dto): array
    {
        try {
            $result = $this->client->entities->createOne('Leads', [
                'lastname' => $dto->name,
                'email' => $dto->email,
                'phone' => $dto->phone?->toE164(),
                'city' => $dto->city,
                'assigned_user_id' => '19x6',
            ]);

            return $result ?? [];
        } catch (Throwable $e) {
            throw VtigerCrmException::failedToCreateLead($dto->email, $e);
        }
    }

    /**
     * @return array<string, scalar>
     * @throws VtigerCrmException
     */
    public function createContact(VtigerContactData $dto): array
    {
        try {
            $result = $this->client->entities->createOne('Contacts', [
                'firstname' => $dto->firstname,
                'lastname' => $dto->lastname,
                'email' => $dto->email,
                'phone' => $dto->phone?->toE164(),
                'mailingcity' => $dto->city,
                'mailingcountry' => $dto->country,
                'leadsource' => $dto->leadsource,
                'assigned_user_id' => $dto->assigned_user_id,
            ]);

            return $result ?? [];
        } catch (Throwable $e) {
            throw VtigerCrmException::failedToCreateContact($dto->email, $e);
        }
    }

    /**
     * @return array<string, scalar>
     * @throws VtigerCrmException
     */
    public function createPotential(VtigerPotentialData $dto): array
    {
        try {
            $result = $this->client->entities->createOne('Potentials', [
                'potentialname' => $dto->potentialname,
                'sales_stage' => $dto->sales_stage,
                'related_to' => $dto->related_to,
                'contact_id' => $dto->contact_id,
                'amount' => $dto->amount,
                'closingdate' => $dto->closingdate,
                'assigned_user_id' => $dto->assigned_user_id,
                'description' => $dto->description,
                'leadsource' => $dto->leadsource,
            ]);

            return $result ?? [];
        } catch (Throwable $e) {
            throw VtigerCrmException::failedToCreatePotential($dto->potentialname, $e);
        }
    }

    /**
     * @throws VtigerCrmException
     */
    public function findContactByEmail(string $email): ?string
    {
        try {
            $result = $this->client->runQuery("SELECT id FROM Contacts WHERE email='{$email}';");

            return $result[0]['id'] ?? null;
        } catch (Throwable $e) {
            throw VtigerCrmException::failedToFindContact($email, $e);
        }
    }
}
