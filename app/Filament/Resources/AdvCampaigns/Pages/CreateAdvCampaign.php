<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdvCampaigns\Pages;

use App\Filament\Resources\AdvCampaigns\AdvCampaignResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAdvCampaign extends CreateRecord
{
    protected static string $resource = AdvCampaignResource::class;
}
