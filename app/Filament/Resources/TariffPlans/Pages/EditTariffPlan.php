<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans\Pages;

use App\Filament\Resources\TariffPlans\TariffPlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Override;

class EditTariffPlan extends EditRecord
{
    protected static string $resource = TariffPlanResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    #[Override]
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    #[Override]
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Тарифный план успешно обновлен';
    }
}
