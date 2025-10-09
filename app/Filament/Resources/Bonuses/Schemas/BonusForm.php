<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bonuses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\PaymentType;
use App\Filament\Components\Money;

class BonusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Money::input('amount'),
                TextInput::make('code')
                    ->numeric()
                    ->inputMode('numeric')
                    ->rule('integer'),
                Select::make('source_id')
                    ->relationship('sender', 'name')
                    ->searchable()
                    ->preload(),
                Select::make('target_id')
                    ->relationship('receiver', 'name')
                    ->searchable()
                    ->preload(),
                Select::make('type')
                    ->options(PaymentType::options()),
            ]);
    }
}
