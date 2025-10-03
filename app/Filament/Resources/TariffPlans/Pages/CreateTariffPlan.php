<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans\Pages;

use App\Filament\Resources\TariffPlans\TariffPlanResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateTariffPlan extends CreateRecord
{
    protected static string $resource = TariffPlanResource::class;

    #[Override]
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    #[Override]
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Тарифный план успешно создан';
    }
}
