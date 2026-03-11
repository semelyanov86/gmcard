<?php

declare(strict_types=1);

namespace App\Filament\Resources\HelpPosts\Pages;

use App\Filament\Resources\HelpPosts\HelpPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Override;

class EditHelpPost extends EditRecord
{
    protected static string $resource = HelpPostResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
