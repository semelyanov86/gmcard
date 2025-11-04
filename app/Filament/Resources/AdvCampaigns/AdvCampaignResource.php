<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdvCampaigns;

use App\Filament\Resources\AdvCampaigns\Pages\CreateAdvCampaign;
use App\Filament\Resources\AdvCampaigns\Pages\EditAdvCampaign;
use App\Filament\Resources\AdvCampaigns\Pages\ListAdvCampaigns;
use App\Filament\Resources\AdvCampaigns\Schemas\AdvCampaignForm;
use App\Filament\Resources\AdvCampaigns\Tables\AdvCampaignsTable;
use App\Models\AdvCampaign;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

class AdvCampaignResource extends Resource
{
    protected static ?string $model = AdvCampaign::class;

    protected static ?string $navigationLabel = 'Рекламные кампании';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return AdvCampaignForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return AdvCampaignsTable::configure($table);
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
            'index' => ListAdvCampaigns::route('/'),
            'create' => CreateAdvCampaign::route('/create'),
            'edit' => EditAdvCampaign::route('/{record}/edit'),
        ];
    }
}
