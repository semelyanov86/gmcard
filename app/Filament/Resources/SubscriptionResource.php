<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionResource\Pages;
use App\Models\Subscription;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static ?string $navigationLabel = 'Подписки';

    protected static ?int $navigationSort = 18;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('type')->label('Тип')->maxLength(255)->nullable(),
                TextInput::make('status')->label('Статус')->maxLength(255)->nullable(),
                DateTimePicker::make('expires_at')->label('Истекает')->nullable(),
                Select::make('user_id')->label('Пользователь')->relationship('user', 'name')->searchable()->preload()->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Пользователь')->toggleable(),
                Tables\Columns\TextColumn::make('type')->label('Тип')->badge()->toggleable(),
                Tables\Columns\TextColumn::make('status')->label('Статус')->badge()->color(fn($state) => $state === 'active' ? 'success' : 'warning')->toggleable(),
                Tables\Columns\TextColumn::make('expires_at')->label('Истекает')->dateTime('d.m.Y H:i')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Создано')->dateTime('d.m.Y H:i')->sortable(),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptions::route('/'),
            'create' => Pages\CreateSubscription::route('/create'),
            'edit' => Pages\EditSubscription::route('/{record}/edit'),
        ];
    }
} 