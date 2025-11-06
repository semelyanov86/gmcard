<?php

declare(strict_types=1);

namespace App\Filament\Resources\Addresses\Schemas;

use Filament\Forms\Components\TextInput;
use App\Filament\Components\Phone;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Адрес')
                    ->required(),
                Textarea::make('open_hours')
                    ->label('Часы работы')
                    ->columnSpanFull(),
                Phone::input('phone')
                    ->label('Телефон')
                    ->required(),
                Phone::input('phone_secondary')
                    ->label('Дополнительный телефон'),
                TextInput::make('website')
                    ->label('Веб-сайт'),
            ]);
    }
}
