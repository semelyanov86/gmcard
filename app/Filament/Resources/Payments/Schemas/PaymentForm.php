<?php

declare(strict_types=1);

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\PaymentType;
use App\Filament\Components\Money;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('payment_date')
                    ->label('Дата платежа')
                    ->required(),
                Money::input('amount')
                    ->label('Сумма')
                    ->required(),
                Select::make('type')
                    ->label('Тип')
                    ->options(PaymentType::options())
                    ->required(),
                TextInput::make('description')
                    ->label('Описание')
                    ->required(),
                TextInput::make('transaction_id')
                    ->label('ID транзакции')
                    ->numeric(),
                Select::make('user_id')
                    ->label('Пользователь')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }
}
