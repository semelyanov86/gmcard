<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoUsages\Pages;

use App\Filament\Resources\PromoUsages\PromoUsageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromoUsages extends ListRecords
{
    protected static string $resource = PromoUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
