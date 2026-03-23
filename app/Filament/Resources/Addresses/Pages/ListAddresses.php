<?php

declare(strict_types=1);

namespace App\Filament\Resources\Addresses\Pages;

use App\Filament\Resources\Addresses\AddressResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Override;

class ListAddresses extends ListRecords
{
    protected static string $resource = AddressResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
