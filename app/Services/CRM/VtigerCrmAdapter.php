<?php

declare(strict_types=1);

namespace App\Services\CRM;

use App\Contracts\VtigerCrmInterface;
use App\Data\PopUpData;
use Salaros\Vtiger\VTWSCLib\WSClient;

final readonly class VtigerCrmAdapter implements VtigerCrmInterface
{
    protected WSClient $client;

    public function __construct()
    {
        $this->client = new WSClient(
            config('services.vtiger.url'),
            config('services.vtiger.username'),
            config('services.vtiger.access_key')
        );
    }

    public function createLead(PopUpData $dto): array
    {
        return $this->client->entities->createOne('Leads', [
            'lastname'         => $dto->name,
            'email'            => $dto->email,
            'phone'            => $dto->phone,
            'city'             => $dto->city,
            'assigned_user_id' => '19x6',
        ]);
    }
}
