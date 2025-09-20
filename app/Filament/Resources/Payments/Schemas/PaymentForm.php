<?php

declare(strict_types=1);

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\PaymentType;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('payment_date')
                    ->required(),
                TextInput::make('amount')
                    ->formatStateUsing(fn($state) => (string)$state)
                    ->required(),
                Select::make('type')
                    ->options(fn() => collect(PaymentType::cases())->mapWithKeys(fn(PaymentType $type) => [
                        $type->value => $type->value,
                    ])->all())
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
