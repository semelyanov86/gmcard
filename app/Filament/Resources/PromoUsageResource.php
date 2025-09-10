<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PromoUsageResource\Pages;
use App\Models\PromoUsage;
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

class PromoUsageResource extends Resource
{
    protected static ?string $model = PromoUsage::class;

    protected static ?string $navigationLabel = 'Использования промо';

    protected static ?int $navigationSort = 20;

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                DateTimePicker::make('used_at')->label('Использовано')->nullable(),
                TextInput::make('status')->label('Статус')->maxLength(255)->nullable(),
                Select::make('user_id')->label('Пользователь')->relationship('user', 'name')->searchable()->preload()->nullable(),
                Select::make('promo_id')->label('Промо')->relationship('promo', 'name')->searchable()->preload()->nullable(),
            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Пользователь')->toggleable(),
                Tables\Columns\TextColumn::make('promo.name')->label('Промо')->toggleable(),
                Tables\Columns\TextColumn::make('status')->label('Статус')->badge()->toggleable(),
                Tables\Columns\TextColumn::make('used_at')->label('Использовано')->dateTime('d.m.Y H:i')->sortable(),
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

    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromoUsages::route('/'),
            'create' => Pages\CreatePromoUsage::route('/create'),
            'edit' => Pages\EditPromoUsage::route('/{record}/edit'),
        ];
    }
}
