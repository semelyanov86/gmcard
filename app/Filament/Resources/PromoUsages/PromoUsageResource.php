<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoUsages;

use App\Filament\Resources\PromoUsages\Pages\CreatePromoUsage;
use App\Filament\Resources\PromoUsages\Pages\EditPromoUsage;
use App\Filament\Resources\PromoUsages\Pages\ListPromoUsages;
use App\Filament\Resources\PromoUsages\Schemas\PromoUsageForm;
use App\Filament\Resources\PromoUsages\Tables\PromoUsagesTable;
use App\Models\PromoUsage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PromoUsageResource extends Resource
{
    protected static ?string $model = PromoUsage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return PromoUsageForm::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return PromoUsagesTable::configure($table);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPromoUsages::route('/'),
            'create' => CreatePromoUsage::route('/create'),
            'edit' => EditPromoUsage::route('/{record}/edit'),
        ];
    }
}
