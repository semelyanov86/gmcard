<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoTypes\Pages;

use App\Filament\Resources\PromoTypes\PromoTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPromoType extends EditRecord
{
    protected static string $resource = PromoTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
