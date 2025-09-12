<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bonuses\Pages;

use App\Filament\Resources\Bonuses\BonusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBonus extends CreateRecord
{
    protected static string $resource = BonusResource::class;
}
