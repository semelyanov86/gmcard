<?php

declare(strict_types=1);

namespace App\Filament\Resources\HelpPosts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HelpPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Заголовок')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Слаг')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Textarea::make('content')
                    ->label('Контент')
                    ->rows(10)
                    ->columnSpanFull(),
            ]);
    }
}


