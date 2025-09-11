<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('payment_date')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Select::make('type')
                    ->options(['incoming' => 'Incoming', 'outgoing' => 'Outgoing'])
                    ->required(),
                TextInput::make('currency')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('transaction_id')
                    ->numeric(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }
}
