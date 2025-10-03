<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Filament\Components\Money;
use Filament\Schemas\Schema;

class TariffPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),
                Money::input('price')
                    ->required(),
                Money::input('banner_price'),
                TextInput::make('ads_count')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->required(),
            ]);
    }
}
