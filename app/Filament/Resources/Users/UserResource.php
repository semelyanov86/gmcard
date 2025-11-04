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
use App\Enums\RoleType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Override;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Пользователи';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function canCreate(): bool
    {
        $user = auth()->user();

        return $user && ($user->hasRole(RoleType::SUPER_ADMIN->value) || $user->hasRole(RoleType::ADMIN->value));
    }

    public static function canEdit(Model $record): bool
    {
        $user = auth()->user();

        if ($user && $user->hasRole(RoleType::SUPER_ADMIN->value)) {
            return true;
        }

        if ($user && $user->hasRole(RoleType::ADMIN->value)) {
            return method_exists($record, 'hasRole') && ($record->hasRole(RoleType::MODERATOR->value) || $record->hasRole(RoleType::USER->value));
        }

        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return self::canEdit($record);
    }

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    #[Override]
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
