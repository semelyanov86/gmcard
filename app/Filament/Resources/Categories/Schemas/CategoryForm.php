<?php

declare(strict_types=1);

namespace App\Filament\Resources\Categories\Schemas;

use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Название')
                    ->required(),
                Textarea::make('description')
                    ->label('Описание')
                    ->columnSpanFull(),
                SelectTree::make('parent_id')
                    ->label('Родительская категория')
                    ->relationship('parent', 'name', 'parent_id')
                    ->nullable()
                    ->multiple(false)
                    ->enableBranchNode()
                    ->independent(false)
                    ->defaultOpenLevel(1)
                    ->searchable()
                    ->placeholder(__('Please select a category'))
                    ->emptyLabel(__('Oops, no results have been found!'))
                    ->withCount(),
                Toggle::make('is_starred')
                    ->label('Избранное')
                    ->default(false)
                    ->required(),
                TextInput::make('icon_index')
                    ->label('Номер иконки (1-12)')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(12)
                    ->nullable()
                    ->helperText('Номер иконки для отображения в навбаре'),
            ]);
    }
}
