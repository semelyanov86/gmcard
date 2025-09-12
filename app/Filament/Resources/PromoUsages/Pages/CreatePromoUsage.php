<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoUsages\Pages;

use App\Filament\Resources\PromoUsages\PromoUsageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePromoUsage extends CreateRecord
{
    protected static string $resource = PromoUsageResource::class;
}
