<?php

namespace App\Filament\Resources\AdvCampaigns\Pages;

use App\Filament\Resources\AdvCampaigns\AdvCampaignResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdvCampaigns extends ListRecords
{
    protected static string $resource = AdvCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
