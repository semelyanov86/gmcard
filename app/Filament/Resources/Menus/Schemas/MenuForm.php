<?php

declare(strict_types=1);

namespace App\Filament\Resources\Menus\Schemas;

use App\Enums\MenuType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->label('Название')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Главная'),
                TextInput::make('url')
                    ->label('URL')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('/')
                    ->helperText('Относительный или полный URL'),
                Select::make('type')
                    ->label('Тип меню')
                    ->options(MenuType::formOptions())
                    ->required()
                    ->native(false),
                TextInput::make('order')
                    ->label('Порядок')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Чем меньше число, тем выше в списке'),
                Toggle::make('is_active')
                    ->label('Активен')
                    ->default(true)
                    ->inline(false),
            ]);
    }
}
