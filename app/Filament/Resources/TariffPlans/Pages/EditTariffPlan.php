<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans\Pages;

use App\Filament\Resources\TariffPlans\TariffPlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTariffPlan extends EditRecord
{
    protected static string $resource = TariffPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Тарифный план успешно обновлен';
    }
}
