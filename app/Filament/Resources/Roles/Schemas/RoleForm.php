<?php

declare(strict_types=1);

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Название роли')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('guard_name')
                    ->label('Guard')
                    ->default('web')
                    ->placeholder('web')
                    ->required(),
                Select::make('permissions')
                    ->label('Права доступа')
                    ->multiple()
                    ->relationship('permissions', 'name')
                    ->preload(),
            ]);
    }
}
