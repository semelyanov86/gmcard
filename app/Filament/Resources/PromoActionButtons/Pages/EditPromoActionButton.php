<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoActionButtons\Pages;

use App\Filament\Resources\PromoActionButtons\PromoActionButtonResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Override;

class EditPromoActionButton extends EditRecord
{
    protected static string $resource = PromoActionButtonResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
