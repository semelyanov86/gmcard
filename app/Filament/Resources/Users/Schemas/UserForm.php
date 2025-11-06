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
                    ->label('Имя')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')
                    ->label('Email подтвержден'),
                Password::make(),
                TextInput::make('last_name')
                    ->label('Фамилия'),
                TextInput::make('age')
                    ->label('Возраст')
                    ->required()
                    ->numeric()
                    ->default(0),
                Money::input('balance')
                    ->label('Баланс'),
                TextInput::make('bonus_balance')
                    ->label('Бонусный баланс')
                    ->numeric()
                    ->default(0),
                TextInput::make('job')
                    ->label('Работа'),
                Select::make('job_status')
                    ->label('Статус работы')
                    ->options(JobStatusType::options()),
                TextInput::make('city')
                    ->label('Город')
                    ->numeric(),
                TextInput::make('country')
                    ->label('Страна'),
                Select::make('tariff_plan_id')
                    ->label('Тарифный план')
                    ->relationship('tariffPlan', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Название')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('description')
                            ->label('Описание'),
                        Money::input('price')
                            ->label('Цена')
                            ->required(),
                        Money::input('banner_price')
                            ->label('Цена баннера'),
                        TextInput::make('ads_count')
                            ->label('Количество объявлений')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ])
                    ->placeholder('Выберите тарифный план'),
                DatePicker::make('birth_date')
                    ->label('Дата рождения'),
                RolesSelect::make(),
                Select::make('gender')
                    ->label('Пол')
                    ->options(GenderType::options()),
                TextInput::make('code')
                    ->label('Код'),
            ]);
    }
}
