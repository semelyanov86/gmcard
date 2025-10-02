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
use App\Enums\RoleType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Override;

class TariffPlanResource extends Resource
{
    protected static ?string $model = TariffPlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Тарифные планы';

    protected static ?string $modelLabel = 'Тарифный план';

    protected static ?string $pluralModelLabel = 'Тарифные планы';

    protected static ?int $navigationSort = 3;

    public static function canCreate(): bool
    {
        $user = auth()->user();

        return $user && ($user->hasRole(RoleType::SUPER_ADMIN->value) || $user->hasRole(RoleType::ADMIN->value));
    }

    public static function canEdit(Model $record): bool
    {
        $user = auth()->user();

        return $user && ($user->hasRole(RoleType::SUPER_ADMIN->value) || $user->hasRole(RoleType::ADMIN->value));
    }

    public static function canDelete(Model $record): bool
    {
        $user = auth()->user();

        return $user && ($user->hasRole(RoleType::SUPER_ADMIN->value) || $user->hasRole(RoleType::ADMIN->value));
    }

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
