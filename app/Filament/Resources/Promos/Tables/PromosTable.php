<?php

declare(strict_types=1);

namespace App\Filament\Resources\Promos\Tables;

use App\Filament\Components\DaysAvailabilityColumn;
use App\Filament\Components\SmmLinksColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use App\Filament\Components\Money;

final class PromosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Пользователь')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('promoType.name')
                    ->label('Тип акции')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('code')
                    ->label('Код')
                    ->searchable(),
                TextColumn::make('img')
                    ->label('Изображение')
                    ->searchable(),
                Money::column('amount')
                    ->label('Сумма'),
                TextColumn::make('video_link')
                    ->label('Ссылка на видео')
                    ->searchable(),
                SmmLinksColumn::make('smm_links')
                    ->label('Ссылки на соцсети')
                    ->searchable(),
                DaysAvailabilityColumn::make()
                    ->label('Дни доступности')
                    ->searchable(),
                TextColumn::make('availabe_from')
                    ->label('Доступно с')
                    ->date()
                    ->sortable(),
                TextColumn::make('available_to')
                    ->label('Доступно до')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('started_at')
                    ->label('Начато')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('available_till')
                    ->label('Доступно до')
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('show_on_home')
                    ->label('На главной')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('raise_on_top_hours')
                    ->label('Поднять в топ (часов)')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('restart_after_finish_days')
                    ->label('Перезапуск (дней)')
                    ->numeric()
                    ->sortable(),
                Money::column('sales_order_from')
                    ->label('Минимальная сумма заказа'),
                Money::column('free_delivery_from')
                    ->label('Бесплатная доставка от'),
                IconColumn::make('free_delivery')
                    ->label('Бесплатная доставка')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('approved_at')
                    ->label('Одобрено')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('approving_notes')
                    ->label('Заметки об одобрении')
                    ->searchable(),
                TextColumn::make('crmid')
                    ->label('CRM ID')
                    ->searchable(),
                TextColumn::make('advCampaign.name')
                    ->label('Рекламная кампания')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('organisation.name')
                    ->label('Организация')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('discount')
                    ->label('Скидка')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
