<?php

namespace App\Filament\Resources\PromoUsages\Pages;

use App\Filament\Resources\PromoUsages\PromoUsageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPromoUsage extends EditRecord
{
    protected static string $resource = PromoUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
