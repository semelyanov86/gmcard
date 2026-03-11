<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdvCampaigns\Pages;

use App\Filament\Resources\AdvCampaigns\AdvCampaignResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Override;

class EditAdvCampaign extends EditRecord
{
    protected static string $resource = AdvCampaignResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
