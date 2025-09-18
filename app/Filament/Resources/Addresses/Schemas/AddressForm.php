<?php

declare(strict_types=1);

namespace App\Filament\Resources\Addresses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('open_hours')
                    ->columnSpanFull(),
                TextInput::make('phone')
                    ->tel()
                    ->formatStateUsing(fn ($state) => (string) $state)
                    ->required(),
                TextInput::make('phone_secondary')
                    ->tel()
                    ->formatStateUsing(fn ($state) => (string) $state),
                TextInput::make('website'),
            ]);
    }
}
