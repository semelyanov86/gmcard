<?php

declare(strict_types=1);

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Filament\Components\MoneyInput;
use App\Enums\SubscriptionType;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('type')
                    ->options(SubscriptionType::options())
                    ->required(),
                MoneyInput::make('amount')
                    ->required(),
                TextInput::make('periodicity')
                    ->required(),
            ]);
    }
}
