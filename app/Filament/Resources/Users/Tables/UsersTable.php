<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Components\Money;
use Filament\Tables\Table;

final class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->label('Email подтвержден')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('last_name')
                    ->label('Фамилия')
                    ->searchable(),
                TextColumn::make('age')
                    ->label('Возраст')
                    ->numeric()
                    ->sortable(),
                Money::column('balance')
                    ->label('Баланс'),
                TextColumn::make('bonus_balance')
                    ->label('Бонусный баланс')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('job')
                    ->label('Работа')
                    ->searchable(),
                TextColumn::make('job_status')
                    ->label('Статус работы')
                    ->searchable(),
                TextColumn::make('city')
                    ->label('Город')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('country')
                    ->label('Страна')
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->label('Дата рождения')
                    ->date()
                    ->sortable(),
                TextColumn::make('roles.name')
                    ->label('Роли')
                    ->badge()
                    ->separator(', ')
                    ->searchable(),
                TextColumn::make('gender')
                    ->label('Пол'),
                TextColumn::make('code')
                    ->label('Код')
                    ->searchable(),
                TextColumn::make('tariffPlan.name')
                    ->label('Тарифный план')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->placeholder('Не выбран'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
