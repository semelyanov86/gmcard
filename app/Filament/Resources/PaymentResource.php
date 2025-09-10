<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
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

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationLabel = 'Платежи';

    protected static ?int $navigationSort = 16;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                DateTimePicker::make('payment_date')->label('Дата платежа')->required()->nullable(),
                TextInput::make('amount')->label('Сумма')->numeric()->required(),
                TextInput::make('type')->label('Тип')->maxLength(255)->nullable(),
                TextInput::make('currency')->label('Валюта')->maxLength(16)->nullable(),
                Textarea::make('description')->label('Описание')->rows(3)->nullable(),
                TextInput::make('transaction_id')->label('Транзакция')->maxLength(255)->nullable(),
                Select::make('user_id')->label('Пользователь')->relationship('user', 'name')->searchable()->preload()->nullable(),
            ]);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Пользователь')->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('amount')->label('Сумма')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('currency')->label('Валюта')->toggleable(),
                Tables\Columns\TextColumn::make('type')->label('Тип')->badge()->toggleable(),
                Tables\Columns\TextColumn::make('payment_date')->label('Дата')->dateTime('d.m.Y H:i')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Создано')->dateTime('d.m.Y H:i')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('currency')->label('Валюта'),
            ])
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
