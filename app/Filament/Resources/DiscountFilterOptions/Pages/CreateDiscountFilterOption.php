<?php

declare(strict_types=1);

namespace App\Filament\Resources\DiscountFilterOptions\Pages;

use App\Filament\Resources\DiscountFilterOptions\DiscountFilterOptionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDiscountFilterOption extends CreateRecord
{
    protected static string $resource = DiscountFilterOptionResource::class;
}
