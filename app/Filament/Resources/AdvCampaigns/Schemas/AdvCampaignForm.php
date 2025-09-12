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
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('crmid')
                    ->required()
                    ->numeric(),
                TextInput::make('action_details'),
                TextInput::make('deeplink'),
                TextInput::make('avg_hold_time'),
                TextInput::make('avg_money_transfer_time'),
            ]);
    }
}
