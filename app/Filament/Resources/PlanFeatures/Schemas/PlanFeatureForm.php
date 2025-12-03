<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlanFeatures\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PlanFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('system_name')
                    ->label('Системное имя')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('display_name')
                    ->label('Отображаемое название')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Описание')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}


