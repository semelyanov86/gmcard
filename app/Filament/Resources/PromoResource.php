<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoResource\Pages;
use App\Models\Promo;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PromoResource extends Resource
{
    protected static ?string $model = Promo::class;

    protected static ?string $navigationLabel = 'Промо';

    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')->label('Название')->required()->maxLength(255),
                Select::make('type')->label('Тип')->options([
                    'discount' => 'Скидка',
                    'cashback' => 'Кэшбэк',
                    'gift' => 'Подарок',
                ])->nullable(),
                TextInput::make('code')->label('Код')->maxLength(255)->nullable(),
                TextInput::make('img')->label('Изображение')->maxLength(255)->nullable(),
                TextInput::make('amount')->label('Сумма')->numeric()->nullable(),
                Textarea::make('description')->label('Описание')->rows(4)->nullable(),
                Textarea::make('extra_conditions')->label('Доп. условия')->rows(3)->nullable(),
                TextInput::make('video_link')->label('Видео')->maxLength(255)->nullable(),
                Textarea::make('smm_links')->label('SMM ссылки')->rows(3)->nullable(),
                Textarea::make('days_availability')->label('Доступность по дням')->rows(2)->nullable(),
                DatePicker::make('availabe_from')->label('Доступно с')->nullable(),
                DateTimePicker::make('available_to')->label('Доступно до')->nullable(),
                DateTimePicker::make('started_at')->label('Старт')->nullable(),
                DateTimePicker::make('available_till')->label('Окончание')->nullable(),
                Toggle::make('show_on_home')->label('Показывать на главной')->inline(false),
                TextInput::make('raise_on_top_hours')->label('Поднятие (часы)')->numeric()->nullable(),
                TextInput::make('restart_after_finish_days')->label('Перезапуск (дни)')->numeric()->nullable(),
                TextInput::make('sales_order_from')->label('Заказ от')->numeric()->nullable(),
                TextInput::make('free_delivery_from')->label('Бесплатная доставка от')->numeric()->nullable(),
                Toggle::make('free_delivery')->label('Бесплатная доставка')->inline(false),
                DateTimePicker::make('approved_at')->label('Одобрено')->nullable(),
                Textarea::make('approving_notes')->label('Заметки об одобрении')->rows(3)->nullable(),
                TextInput::make('crmid')->label('CRM ID')->numeric()->nullable(),
                Select::make('adv_campaign_id')->label('Рекламная кампания')->relationship('advCampaign', 'name')->searchable()->preload()->nullable(),
                Select::make('organisation_id')->label('Организация')->relationship('organisation', 'name')->searchable()->preload()->nullable(),
                TextInput::make('dicsount')->label('Скидка, %')->numeric()->nullable(),
                Select::make('categories')->label('Категории')->multiple()->relationship('categories', 'name')->preload()->searchable(),
                Select::make('cities')->label('Города')->multiple()->relationship('cities', 'name')->preload()->searchable(),
                Select::make('addresses')->label('Адреса')->multiple()->relationship('addresses', 'name')->preload()->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Название')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('type')->label('Тип')->badge(),
                Tables\Columns\TextColumn::make('code')->label('Код')->toggleable(),
                Tables\Columns\TextColumn::make('amount')->label('Сумма')->numeric()->sortable()->toggleable(),
                Tables\Columns\IconColumn::make('show_on_home')->label('На главной')->boolean(),
                Tables\Columns\IconColumn::make('free_delivery')->label('Бесплатная доставка')->boolean(),
                Tables\Columns\TextColumn::make('approved_at')->label('Одобрено')->dateTime('d.m.Y H:i')->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('created_at')->label('Создано')->dateTime('d.m.Y H:i')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')->label('Тип')->options([
                    'discount' => 'Скидка',
                    'cashback' => 'Кэшбэк',
                    'gift' => 'Подарок',
                ]),
                Tables\Filters\TernaryFilter::make('show_on_home')->label('На главной'),
                Tables\Filters\TernaryFilter::make('free_delivery')->label('Бесплатная доставка'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromos::route('/'),
            'create' => Pages\CreatePromo::route('/create'),
            'edit' => Pages\EditPromo::route('/{record}/edit'),
        ];
    }
} 