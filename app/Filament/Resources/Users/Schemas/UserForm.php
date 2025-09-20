<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use App\Filament\Components\RolesSelect;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\GenderType;
use App\Enums\JobStatusType;

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
                    ->required(fn (string $context): bool => $context === 'create')
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->dehydrateStateUsing(fn (?string $state): ?string => filled($state) ? bcrypt($state) : null),
                TextInput::make('last_name'),
                TextInput::make('age')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('balance')
                    ->numeric()
                    ->default(0.0),
                TextInput::make('job'),
                Select::make('job_status')
                    ->options(JobStatusType::options()),
                TextInput::make('city')
                    ->numeric(),
                TextInput::make('country'),
                DatePicker::make('birth_date'),
                RolesSelect::make(),
                Select::make('gender')
                    ->options(GenderType::options()),
                TextInput::make('code'),
            ]);
    }
}
