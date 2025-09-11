<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Models\Media;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Override;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationLabel = 'Медиа';

    protected static ?int $navigationSort = 19;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('type')->label('Тип медиа')->maxLength(255)->nullable(),
            ]);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('type')->label('Тип')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Создано')->dateTime('d.m.Y H:i')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('Обновлено')->dateTime('d.m.Y H:i')->sortable()->toggleable(),
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

    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
