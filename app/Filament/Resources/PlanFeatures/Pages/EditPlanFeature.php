<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlanFeatures\Pages;

use App\Filament\Resources\PlanFeatures\PlanFeatureResource;
use Filament\Resources\Pages\EditRecord;

class EditPlanFeature extends EditRecord
{
    protected static string $resource = PlanFeatureResource::class;
}
