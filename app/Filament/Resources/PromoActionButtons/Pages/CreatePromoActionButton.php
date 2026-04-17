<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoActionButtons\Pages;

use App\Filament\Resources\PromoActionButtons\PromoActionButtonResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePromoActionButton extends CreateRecord
{
    protected static string $resource = PromoActionButtonResource::class;
}
