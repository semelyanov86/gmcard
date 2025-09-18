<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bonuses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BonusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('amount')
                    ->formatStateUsing(fn ($state) => (string) $state),
                TextInput::make('code')
                    ->numeric(),
                TextInput::make('source_id')
                    ->numeric(),
                TextInput::make('target_id')
                    ->numeric(),
                Select::make('type')
                    ->options(['incoming' => 'Incoming', 'outgoing' => 'Outgoing']),
            ]);
    }
}
