<?php

namespace App\Filament\Resources\Bonuses\Pages;

use App\Filament\Resources\Bonuses\BonusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBonus extends EditRecord
{
    protected static string $resource = BonusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
