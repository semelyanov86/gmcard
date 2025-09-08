<?php

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

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationLabel = 'Медиа';

    protected static ?int $navigationSort = 19;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('filename')->label('Имя файла')->required()->maxLength(255),
                TextInput::make('original_name')->label('Оригинальное имя')->maxLength(255)->nullable(),
                TextInput::make('mime_type')->label('MIME')->maxLength(255)->nullable(),
                TextInput::make('size')->label('Размер (байт)')->numeric()->nullable(),
                TextInput::make('path')->label('Путь')->maxLength(255)->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('filename')->label('Имя файла')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('mime_type')->label('MIME')->toggleable(),
                Tables\Columns\TextColumn::make('size')->label('Размер')->numeric()->sortable()->toggleable(),
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
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
} 