<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoTypes\Pages;

use App\Filament\Resources\PromoTypes\PromoTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePromoType extends CreateRecord
{
    protected static string $resource = PromoTypeResource::class;
}

