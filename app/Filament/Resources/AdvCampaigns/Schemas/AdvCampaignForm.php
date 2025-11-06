<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdvCampaigns\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AdvCampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Название')
                    ->required(),
                TextInput::make('description')
                    ->label('Описание')
                    ->required(),
                TextInput::make('crmid')
                    ->label('crmid'),
                TextInput::make('action_details')
                    ->label('Детали акции'),
                TextInput::make('deeplink')
                    ->label('Диплинк'),
                TextInput::make('avg_hold_time')
                    ->label('Среднее время удержания'),
                TextInput::make('avg_money_transfer_time')
                    ->label('Среднее время перевода денег'),
            ]);
    }
}
