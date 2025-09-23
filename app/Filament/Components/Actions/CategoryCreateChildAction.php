<?php

declare(strict_types=1);

namespace App\Filament\Components\Actions;

use App\Models\Category;
use Filament\Actions\CreateAction;

final class CategoryCreateChildAction
{
    public static function make(string $name = 'createChild'): CreateAction
    {
        return CreateAction::make($name)
            ->label('Добавить подкатегорию')
            ->mutateFormDataUsing(function (array $data, Category $record): array {
                $data['parent_id'] = $record->getKey();
                return $data;
            });
    }
} 