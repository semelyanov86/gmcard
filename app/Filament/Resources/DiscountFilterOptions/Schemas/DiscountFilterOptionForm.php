<?php

declare(strict_types=1);

namespace App\Filament\Resources\DiscountFilterOptions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class DiscountFilterOptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('min_percent')
                    ->label('Минимальный процент')
                    ->numeric()
                    ->required()
                    ->minValue(1)
                    ->maxValue(100)
                    ->unique(ignoreRecord: true),
                TextInput::make('sort_order')
                    ->label('Порядок сортировки')
                    ->numeric()
                    ->required()
                    ->minValue(1)
                    ->unique(ignoreRecord: true),
            ]);
    }
}
