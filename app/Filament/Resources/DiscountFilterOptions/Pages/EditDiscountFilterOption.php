<?php

declare(strict_types=1);

namespace App\Filament\Resources\DiscountFilterOptions\Pages;

use App\Filament\Resources\DiscountFilterOptions\DiscountFilterOptionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Override;

class EditDiscountFilterOption extends EditRecord
{
    protected static string $resource = DiscountFilterOptionResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
