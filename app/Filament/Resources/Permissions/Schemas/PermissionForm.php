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
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('Permission Name'),
                TextInput::make('guard_name')
                    ->default('web')
                    ->required()
                    ->label('Guard Name'),
                CheckboxList::make('roles')
                    ->relationship('roles', 'name')
                    ->label('Assign to Roles')
                    ->columns(2),
            ]);
    }
}
