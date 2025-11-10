<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoTypes;

use App\Filament\Resources\PromoTypes\Pages\CreatePromoType;
use App\Filament\Resources\PromoTypes\Pages\EditPromoType;
use App\Filament\Resources\PromoTypes\Pages\ListPromoTypes;
use App\Filament\Resources\PromoTypes\Schemas\PromoTypeForm;
use App\Filament\Resources\PromoTypes\Tables\PromoTypesTable;
use App\Models\PromoType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

class PromoTypeResource extends Resource
{
    protected static ?string $model = PromoType::class;

    protected static ?string $navigationLabel = 'Типы акций';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return PromoTypeForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return PromoTypesTable::configure($table);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPromoTypes::route('/'),
            'create' => CreatePromoType::route('/create'),
            'edit' => EditPromoType::route('/{record}/edit'),
        ];
    }
}

