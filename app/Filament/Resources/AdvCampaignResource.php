<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\AdvCampaignResource\Pages;
use App\Models\AdvCampaign;
use Filament\Forms\Components\Textarea;
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

class AdvCampaignResource extends Resource
{
    protected static ?string $model = AdvCampaign::class;

    protected static ?string $navigationLabel = 'Рекламные кампании';

    protected static ?int $navigationSort = 12;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')->label('Название')->required()->maxLength(255),
                Textarea::make('description')->label('Описание')->rows(3)->nullable(),
                TextInput::make('crmid')->label('CRM ID')->numeric()->nullable(),
                Textarea::make('action_details')->label('Детали акции (JSON)')->rows(3)->nullable(),
                TextInput::make('deeplink')->label('Deeplink')->maxLength(255)->nullable(),
                TextInput::make('avg_hold_time')->label('Средн. холд (мин)')->numeric()->nullable(),
                TextInput::make('avg_money_transfer_time')->label('Средн. перевод (мин)')->numeric()->nullable(),
            ]);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Название')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('crmid')->label('CRM ID')->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('promos_count')->label('Промо')->counts('promos')->badge()->color('success'),
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

    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdvCampaigns::route('/'),
            'create' => Pages\CreateAdvCampaign::route('/create'),
            'edit' => Pages\EditAdvCampaign::route('/{record}/edit'),
        ];
    }
}
