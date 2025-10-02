<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans\Pages;

use App\Filament\Resources\TariffPlans\TariffPlanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTariffPlan extends CreateRecord
{
    protected static string $resource = TariffPlanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Тарифный план успешно создан';
    }
}
