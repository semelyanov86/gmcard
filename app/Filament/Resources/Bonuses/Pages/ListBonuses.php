<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bonuses\Pages;

use App\Filament\Resources\Bonuses\BonusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBonuses extends ListRecords
{
    protected static string $resource = BonusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
