<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function canCreate(): bool
    {
        $user = auth()->user();
        return $user && ($user->hasRole('super-admin') || $user->hasRole('admin'));
    }

    public static function canEdit($record): bool
    {
        $user = auth()->user();
        
        // Super-admin может редактировать всех
        if ($user && $user->hasRole('super-admin')) {
            return true;
        }
        
        // Admin может редактировать moderator и user, но не других admin и не super-admin
        if ($user && $user->hasRole('admin')) {
            return $record->hasRole('moderator') || $record->hasRole('user');
        }
        
        return false;
    }

    public static function canDelete($record): bool
    {
        return self::canEdit($record);
    }

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
