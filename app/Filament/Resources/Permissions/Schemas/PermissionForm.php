<?php

declare(strict_types=1);

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Schema;

class PermissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Название права')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('guard_name')
                    ->label('Защита')
                    ->default('web')
                    ->required(),
                CheckboxList::make('roles')
                    ->label('Назначить ролям')
                    ->relationship('roles', 'name')
                    ->columns(2),
            ]);
    }
}
