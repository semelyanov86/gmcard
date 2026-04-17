<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoActionButtons\Pages;

use App\Filament\Resources\PromoActionButtons\PromoActionButtonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Override;

class ListPromoActionButtons extends ListRecords
{
    protected static string $resource = PromoActionButtonResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
