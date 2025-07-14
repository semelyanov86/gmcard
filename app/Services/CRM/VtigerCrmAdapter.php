<?php

namespace App\Services\CRM;

use App\Data\PopUpData;
use Salaros\Vtiger\VTWSCLib\WSClient;

class VtigerCrmAdapter
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

    public function createLead(PopUpData $data): array
    {
        return $this->client->create('Leads', [
            'lastname'         => $data->name,
            'email'            => $data->email,
            'phone'            => $data->phone,
            'city'             => $data->city,
            'assigned_user_id' => '19x6',
        ]);
    }
}
