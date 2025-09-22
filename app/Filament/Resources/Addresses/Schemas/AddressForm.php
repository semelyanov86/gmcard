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
                    ->required(),
                Textarea::make('open_hours')
                    ->columnSpanFull(),
                Phone::input('phone')
                    ->required(),
                Phone::input('phone_secondary'),
                TextInput::make('website'),
            ]);
    }
}
