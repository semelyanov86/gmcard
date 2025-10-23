<?php

declare(strict_types=1);

namespace App\Actions\Menu;

use App\Data\MenuData;
use App\Enums\MenuType;
use App\Models\Menu;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static MenuData[] run(MenuType $type)
 */
final readonly class GetMenuItemsAction
{
    use AsAction;

    /**
     * @return MenuData[]
     */
    public function handle(MenuType $type): array
    {
        $menuItems = Menu::active()
            ->byType($type->value)
            ->ordered()
            ->get();

        return MenuData::collect($menuItems, 'array');
    }
}
