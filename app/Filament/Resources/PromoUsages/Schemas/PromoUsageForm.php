<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoUsages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PromoUsageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('promo_id')
                    ->relationship('promo', 'name')
                    ->required(),
                DateTimePicker::make('used_at')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                TextInput::make('ip')
                    ->required(),
            ]);
    }
}
