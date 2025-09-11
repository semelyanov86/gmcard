<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('last_name'),
                TextInput::make('age')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('balance')
                    ->numeric()
                    ->default(0.0),
                TextInput::make('job'),
                TextInput::make('job_status'),
                TextInput::make('city')
                    ->numeric(),
                TextInput::make('country'),
                DatePicker::make('birth_date'),
                TextInput::make('role'),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other']),
                TextInput::make('code'),
            ]);
    }
}
