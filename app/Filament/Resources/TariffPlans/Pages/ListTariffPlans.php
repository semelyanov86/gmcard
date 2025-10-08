<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans\Pages;

use App\Filament\Resources\TariffPlans\TariffPlanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTariffPlans extends ListRecords
{
    protected static string $resource = TariffPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Создать тарифный план'),
        ];
    }
}
