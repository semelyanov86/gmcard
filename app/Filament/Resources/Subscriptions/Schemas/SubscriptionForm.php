<?php

declare(strict_types=1);

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Filament\Components\Money;
use App\Enums\SubscriptionType;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Пользователь')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('type')
                    ->label('Тип')
                    ->options(SubscriptionType::options())
                    ->required(),
                Money::input('amount')
                    ->label('Сумма')
                    ->required(),
                TextInput::make('periodicity')
                    ->label('Периодичность')
                    ->required(),
            ]);
    }
}
