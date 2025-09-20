<?php

declare(strict_types=1);

namespace App\Services\CRM;

use App\Contracts\VtigerCrmInterface;
use App\Data\PopUpData;
use Salaros\Vtiger\VTWSCLib\WSClient;
use Salaros\Vtiger\VTWSCLib\WSException;

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
     * @throws WSException
     */
    public function createLead(PopUpData $dto): array
    {
        return $this->client->entities->createOne('Leads', [
            'lastname'         => $dto->name,
            'email'            => $dto->email,
            'phone'            => $dto->phone?->toE164(),
            'city'             => $dto->city,
            'assigned_user_id' => '19x6',
        ]);
    }
}
