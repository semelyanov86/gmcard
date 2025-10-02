<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans;

use App\Filament\Resources\TariffPlans\Pages\CreateTariffPlan;
use App\Filament\Resources\TariffPlans\Pages\EditTariffPlan;
use App\Filament\Resources\TariffPlans\Pages\ListTariffPlans;
use App\Filament\Resources\TariffPlans\Schemas\TariffPlanForm;
use App\Filament\Resources\TariffPlans\Tables\TariffPlanTable;
use App\Models\TariffPlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

class TariffPlanResource extends Resource
{
    protected static ?string $model = TariffPlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return TariffPlanForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return TariffPlanTable::configure($table);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTariffPlans::route('/'),
            'create' => CreateTariffPlan::route('/create'),
            'edit' => EditTariffPlan::route('/{record}/edit'),
        ];
    }
}
