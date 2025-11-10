<?php

declare(strict_types=1);

namespace App\Filament\Resources\Promos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Filament\Components\Money;
use Filament\Forms\Components\KeyValue;

class PromoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Название')
                    ->required(),
                Select::make('user_id')
                    ->label('Пользователь')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('promo_type_id')
                    ->label('Тип акции')
                    ->relationship('promoType', 'name')
                    ->required(),
                TextInput::make('code')
                    ->label('Код'),
                TextInput::make('img')
                    ->label('Изображение'),
                Money::input('amount')
                    ->label('Сумма'),
                Textarea::make('description')
                    ->label('Описание')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('extra_conditions')
                    ->label('Дополнительные условия')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('video_link')
                    ->label('Ссылка на видео'),
                KeyValue::make('smm_links')
                    ->label('Ссылки на соцсети')
                    ->keyLabel('Соцсеть')
                    ->valueLabel('Ссылка')
                    ->columnSpanFull(),
                TextInput::make('days_availability')
                    ->label('Дни доступности'),
                DatePicker::make('availabe_from')
                    ->label('Доступно с'),
                TimePicker::make('available_to')
                    ->label('Доступно до'),
                DateTimePicker::make('started_at')
                    ->label('Начато'),
                DateTimePicker::make('available_till')
                    ->label('Доступно до')
                    ->required(),
                Toggle::make('show_on_home')
                    ->label('Показывать на главной')
                    ->default(false)
                    ->required(),
                TextInput::make('raise_on_top_hours')
                    ->label('Поднять в топ (часов)')
                    ->numeric()
                    ->default(0),
                TextInput::make('restart_after_finish_days')
                    ->label('Перезапуск после окончания (дней)')
                    ->numeric()
                    ->default(0),
                Money::input('sales_order_from')
                    ->label('Минимальная сумма заказа'),
                Money::input('free_delivery_from')
                    ->label('Бесплатная доставка от'),
                Toggle::make('free_delivery')
                    ->label('Бесплатная доставка')
                    ->default(false)
                    ->required(),
                DateTimePicker::make('approved_at')
                    ->label('Одобрено'),
                Textarea::make('approving_notes')
                    ->label('Заметки об одобрении')
                    ->columnSpanFull(),
                TextInput::make('crmid')
                    ->label('CRM ID'),
                Select::make('adv_campaign_id')
                    ->label('Рекламная кампания')
                    ->relationship('advCampaign', 'name'),
                Select::make('organisation_id')
                    ->label('Организация')
                    ->relationship('organisation', 'name'),
                TextInput::make('discount')
                    ->label('Скидка'),
            ]);
    }
}
