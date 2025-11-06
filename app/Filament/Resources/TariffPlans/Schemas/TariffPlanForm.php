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
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Слаг')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->label('Описание')
                    ->rows(3)
                    ->columnSpanFull(),
                Money::input('price')
                    ->label('Цена')
                    ->required(),
                Money::input('banner_price'),
                Money::input('extra_ad_price')
                    ->label('Cost of additional shares per day'),
                TextInput::make('ads_count')
                    ->label('Количество объявлений')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->required(),
            ]);
    }
}
