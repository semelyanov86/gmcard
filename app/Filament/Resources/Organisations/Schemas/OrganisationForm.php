<?php

declare(strict_types=1);

namespace App\Filament\Resources\Organisations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\OwnerRoleType;

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
                    ->options(OwnerRoleType::options())
                    ->required(),
                TextInput::make('inn')
                    ->maxLength(15)
                    ->rule('max:15'),
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
