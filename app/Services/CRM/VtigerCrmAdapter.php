<?php

declare(strict_types=1);

namespace App\Services\CRM;

use App\Data\PopUpData;
use Salaros\Vtiger\VTWSCLib\WSClient;

final readonly class VtigerCrmAdapter
{
    protected WSClient $client;

    public function __construct()
    {
        $this->client = new WSClient(
            env('VTIGER_URL'),
            env('VTIGER_USERNAME'),
            env('VTIGER_ACCESS_KEY')
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
