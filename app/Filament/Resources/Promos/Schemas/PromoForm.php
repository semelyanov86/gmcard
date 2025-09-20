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
use App\Enums\PromoType;
use App\Filament\Components\MoneyInput;

class PromoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('type')
                    ->options(PromoType::options())
                    ->required(),
                TextInput::make('code'),
                TextInput::make('img'),
                MoneyInput::make('amount'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('extra_conditions')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('video_link'),
                Textarea::make('smm_links')
                    ->formatStateUsing(fn ($state) => is_array($state) ? json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : $state)
                    ->dehydrateStateUsing(fn ($state) => is_string($state) ? json_decode($state, true) : $state)
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('days_availability'),
                DatePicker::make('availabe_from'),
                TimePicker::make('available_to'),
                DateTimePicker::make('started_at'),
                DateTimePicker::make('available_till')
                    ->required(),
                Toggle::make('show_on_home')
                    ->default(false)
                    ->required(),
                TextInput::make('raise_on_top_hours')
                    ->numeric()
                    ->default(0),
                TextInput::make('restart_after_finish_days')
                    ->numeric()
                    ->default(0),
                TextInput::make('sales_order_from')
                    ->numeric()
                    ->default(0),
                TextInput::make('free_delivery_from')
                    ->numeric()
                    ->default(0),
                Toggle::make('free_delivery')
                    ->default(false)
                    ->required(),
                DateTimePicker::make('approved_at'),
                Textarea::make('approving_notes')
                    ->columnSpanFull(),
                TextInput::make('crmid'),
                Select::make('adv_campaign_id')
                    ->relationship('advCampaign', 'name'),
                Select::make('organisation_id')
                    ->relationship('organisation', 'name'),
                TextInput::make('discount'),
            ]);
    }
}
