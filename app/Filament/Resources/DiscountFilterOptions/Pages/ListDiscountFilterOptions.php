<?php

declare(strict_types=1);

namespace App\Filament\Resources\DiscountFilterOptions\Pages;

use App\Filament\Resources\DiscountFilterOptions\DiscountFilterOptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Override;

class ListDiscountFilterOptions extends ListRecords
{
    protected static string $resource = DiscountFilterOptionResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
