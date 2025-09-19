<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bonuses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\PaymentType;

class BonusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('amount')
                    ->formatStateUsing(fn ($state) => (string) $state),
                TextInput::make('code'),
                Select::make('source_id')
                    ->relationship('sender', 'name')
                    ->searchable(),
                Select::make('target_id')
                    ->relationship('receiver', 'name')
                    ->searchable(),
                Select::make('type')
                    ->options(fn () => collect(PaymentType::cases())->mapWithKeys(fn (PaymentType $type) => [
                        $type->value => $type->value,
                    ])->all()),
            ]);
    }
}
