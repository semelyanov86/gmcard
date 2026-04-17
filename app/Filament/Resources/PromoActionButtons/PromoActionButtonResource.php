<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoActionButtons;

use App\Filament\Resources\PromoActionButtons\Pages\CreatePromoActionButton;
use App\Filament\Resources\PromoActionButtons\Pages\EditPromoActionButton;
use App\Filament\Resources\PromoActionButtons\Pages\ListPromoActionButtons;
use App\Filament\Resources\PromoActionButtons\Schemas\PromoActionButtonForm;
use App\Filament\Resources\PromoActionButtons\Tables\PromoActionButtonsTable;
use App\Models\PromoActionButton;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

class PromoActionButtonResource extends Resource
{
    protected static ?string $model = PromoActionButton::class;

    protected static ?string $modelLabel = 'Текст кнопки акции';

    protected static ?string $pluralModelLabel = 'Текст кнопки акции';

    protected static ?string $navigationLabel = 'Текст кнопки акции';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return PromoActionButtonForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return PromoActionButtonsTable::configure($table);
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
            'index' => ListPromoActionButtons::route('/'),
            'create' => CreatePromoActionButton::route('/create'),
            'edit' => EditPromoActionButton::route('/{record}/edit'),
        ];
    }
}
