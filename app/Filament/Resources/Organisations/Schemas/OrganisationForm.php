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
                    ->label('Адрес')
                    ->relationship('address', 'name')
                    ->required(),
                TextInput::make('name')
                    ->label('Название')
                    ->required(),
                Select::make('owner_role')
                    ->label('Роль владельца')
                    ->options(OwnerRoleType::options())
                    ->required(),
                TextInput::make('inn')
                    ->label('ИНН')
                    ->maxLength(15)
                    ->rule('max:15'),
                TextInput::make('ogrn')
                    ->label('ОГРН'),
                TextInput::make('contact')
                    ->label('Контакт'),
                TextInput::make('contact_fio')
                    ->label('ФИО контакта'),
                TextInput::make('opening_hours')
                    ->label('Часы работы'),
                Select::make('user_id')
                    ->label('Пользователь')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }
}
