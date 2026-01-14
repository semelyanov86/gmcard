<?php

declare(strict_types=1);

namespace App\Filament\Resources\HelpPosts;

use App\Filament\Resources\HelpPosts\Pages\CreateHelpPost;
use App\Filament\Resources\HelpPosts\Pages\EditHelpPost;
use App\Filament\Resources\HelpPosts\Pages\ListHelpPosts;
use App\Filament\Resources\HelpPosts\Schemas\HelpPostForm;
use App\Filament\Resources\HelpPosts\Tables\HelpPostsTable;
use App\Models\HelpPost;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

class HelpPostResource extends Resource
{
    protected static ?string $model = HelpPost::class;

    protected static ?string $navigationLabel = 'Справка';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return HelpPostForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return HelpPostsTable::configure($table);
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
            'index' => ListHelpPosts::route('/'),
            'create' => CreateHelpPost::route('/create'),
            'edit' => EditHelpPost::route('/{record}/edit'),
        ];
    }
}


