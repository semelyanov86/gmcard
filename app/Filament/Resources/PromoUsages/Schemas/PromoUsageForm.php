<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoUsages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PromoUsageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('promo_id')
                    ->label('Промо')
                    ->relationship('promo', 'name')
                    ->required(),
                DateTimePicker::make('used_at')
                    ->label('Использовано')
                    ->required(),
                Select::make('user_id')
                    ->label('Пользователь')
                    ->relationship('user', 'name'),
                TextInput::make('ip')
                    ->label('IP-адрес')
                    ->required(),
            ]);
    }
}
