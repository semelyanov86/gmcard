<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoTypes\Pages;

use App\Filament\Resources\PromoTypes\PromoTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromoTypes extends ListRecords
{
    protected static string $resource = PromoTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
