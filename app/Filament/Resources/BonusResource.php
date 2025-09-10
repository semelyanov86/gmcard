<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\BonusResource\Pages;
use App\Models\Bonus;
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

class BonusResource extends Resource
{
    protected static ?string $model = Bonus::class;

    protected static ?string $navigationLabel = 'Бонусы';

    protected static ?int $navigationSort = 17;

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('amount')->label('Сумма')->numeric()->required(),
                TextInput::make('code')->label('Код')->maxLength(255)->nullable(),
                TextInput::make('type')->label('Тип')->maxLength(255)->nullable(),
                Select::make('source_id')->label('Отправитель')->relationship('sender', 'name')->searchable()->preload()->nullable(),
                Select::make('target_id')->label('Получатель')->relationship('receiver', 'name')->searchable()->preload()->nullable(),
            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('sender.name')->label('Отправитель')->toggleable(),
                Tables\Columns\TextColumn::make('receiver.name')->label('Получатель')->toggleable(),
                Tables\Columns\TextColumn::make('amount')->label('Сумма')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('type')->label('Тип')->badge()->toggleable(),
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
            'index' => Pages\ListBonuses::route('/'),
            'create' => Pages\CreateBonus::route('/create'),
            'edit' => Pages\EditBonus::route('/{record}/edit'),
        ];
    }
}
