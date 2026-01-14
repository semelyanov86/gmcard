<?php

declare(strict_types=1);

namespace App\Filament\Resources\HelpPosts\Pages;

use App\Filament\Resources\HelpPosts\HelpPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHelpPost extends CreateRecord
{
    protected static string $resource = HelpPostResource::class;
}


