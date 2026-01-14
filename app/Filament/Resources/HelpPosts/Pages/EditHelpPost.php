<?php

declare(strict_types=1);

namespace App\Filament\Resources\HelpPosts\Pages;

use App\Filament\Resources\HelpPosts\HelpPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHelpPost extends EditRecord
{
    protected static string $resource = HelpPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}


