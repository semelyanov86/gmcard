<?php

namespace App\Filament\Resources\Promos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

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
                    ->options([
            'simple' => 'Simple',
            'coupon' => 'Coupon',
            'gift' => 'Gift',
            'one_plus_one' => 'One plus one',
            'two_plus_one' => 'Two plus one',
            'cashback' => 'Cashback',
            'konkurs' => 'Konkurs',
        ])
                    ->required(),
                TextInput::make('code'),
                TextInput::make('img'),
                TextInput::make('amount')
                    ->numeric(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('extra_conditions')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('video_link'),
                TextInput::make('smm_links'),
                TextInput::make('days_availability'),
                DatePicker::make('availabe_from'),
                TimePicker::make('available_to'),
                DateTimePicker::make('started_at'),
                DateTimePicker::make('available_till')
                    ->required(),
                Toggle::make('show_on_home')
                    ->required(),
                TextInput::make('raise_on_top_hours')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('restart_after_finish_days')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('sales_order_from')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('free_delivery_from')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('free_delivery')
                    ->required(),
                DateTimePicker::make('approved_at'),
                Textarea::make('approving_notes')
                    ->columnSpanFull(),
                TextInput::make('crmid')
                    ->numeric(),
                Select::make('adv_campaign_id')
                    ->relationship('advCampaign', 'name'),
                Select::make('organisation_id')
                    ->relationship('organisation', 'name'),
                TextInput::make('dicsount'),
            ]);
    }
}
