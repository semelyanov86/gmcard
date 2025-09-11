<?php

namespace App\Filament\Resources\Organisations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrganisationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('address_id')
                    ->relationship('address', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Select::make('owner_role')
                    ->options(['owner' => 'Owner', 'manager' => 'Manager', 'secretary' => 'Secretary', 'other' => 'Other'])
                    ->required(),
                TextInput::make('inn'),
                TextInput::make('ogrn'),
                TextInput::make('contact'),
                TextInput::make('contact_fio'),
                TextInput::make('opening_hours'),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }
}
