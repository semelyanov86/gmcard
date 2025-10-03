<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use App\Filament\Components\RolesSelect;
use App\Filament\Components\Money;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\GenderType;
use App\Enums\JobStatusType;
use App\Filament\Components\Password;

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
                Password::make(),
                TextInput::make('last_name'),
                TextInput::make('age')
                    ->required()
                    ->numeric()
                    ->default(0),
                Money::input('balance'),
                TextInput::make('job'),
                Select::make('job_status')
                    ->options(JobStatusType::options()),
                TextInput::make('city')
                    ->numeric(),
                TextInput::make('country'),
                Select::make('tariff_plan_id')
                    ->label('TariffPlan')
                    ->relationship('tariffPlan', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('description'),
                        Money::input('price')
                            ->required(),
                        Money::input('banner_price'),
                        TextInput::make('ads_count')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ])
                    ->placeholder('Выберите тарифный план'),
                DatePicker::make('birth_date'),
                RolesSelect::make(),
                Select::make('gender')
                    ->options(GenderType::options()),
                TextInput::make('code'),
            ]);
    }
}
