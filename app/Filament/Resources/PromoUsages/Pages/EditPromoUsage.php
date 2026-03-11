<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoUsages\Pages;

use App\Filament\Resources\PromoUsages\PromoUsageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Override;

class EditPromoUsage extends EditRecord
{
    protected static string $resource = PromoUsageResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
