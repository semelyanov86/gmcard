<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bonuses\Pages;

use App\Filament\Resources\Bonuses\BonusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Override;

class EditBonus extends EditRecord
{
    protected static string $resource = BonusResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
