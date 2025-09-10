<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoUsageResource\Pages;

use App\Filament\Resources\PromoUsageResource;
use Filament\Resources\Pages\ListRecords;

class ListPromoUsages extends ListRecords
{
    protected static string $resource = PromoUsageResource::class;
}
