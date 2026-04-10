<?php

declare(strict_types=1);

namespace App\Filament\Resources\DiscountFilterOptions;

use App\Filament\Resources\DiscountFilterOptions\Pages\CreateDiscountFilterOption;
use App\Filament\Resources\DiscountFilterOptions\Pages\EditDiscountFilterOption;
use App\Filament\Resources\DiscountFilterOptions\Pages\ListDiscountFilterOptions;
use App\Filament\Resources\DiscountFilterOptions\Schemas\DiscountFilterOptionForm;
use App\Filament\Resources\DiscountFilterOptions\Tables\DiscountFilterOptionsTable;
use App\Models\DiscountFilterOption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

class DiscountFilterOptionResource extends Resource
{
    protected static ?string $model = DiscountFilterOption::class;

    protected static ?string $navigationLabel = 'Порог скидки';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return DiscountFilterOptionForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return DiscountFilterOptionsTable::configure($table);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListDiscountFilterOptions::route('/'),
            'create' => CreateDiscountFilterOption::route('/create'),
            'edit' => EditDiscountFilterOption::route('/{record}/edit'),
        ];
    }
}
