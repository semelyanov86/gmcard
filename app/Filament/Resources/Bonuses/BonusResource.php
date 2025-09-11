<?php

namespace App\Filament\Resources\Bonuses;

use App\Filament\Resources\Bonuses\Pages\CreateBonus;
use App\Filament\Resources\Bonuses\Pages\EditBonus;
use App\Filament\Resources\Bonuses\Pages\ListBonuses;
use App\Filament\Resources\Bonuses\Schemas\BonusForm;
use App\Filament\Resources\Bonuses\Tables\BonusesTable;
use App\Models\Bonus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BonusResource extends Resource
{
    protected static ?string $model = Bonus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return BonusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BonusesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBonuses::route('/'),
            'create' => CreateBonus::route('/create'),
            'edit' => EditBonus::route('/{record}/edit'),
        ];
    }
}
