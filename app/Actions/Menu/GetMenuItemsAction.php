<?php

declare(strict_types=1);

namespace App\Actions\Menu;

use App\Data\MenuData;
use App\Models\Menu;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static MenuData[] run(string $type)
 */
final readonly class GetMenuItemsAction
{
    use AsAction;

    /**
     * @return MenuData[]
     */
    public function handle(string $type): array
    {
        $menuItems = Menu::active()
            ->byType($type)
            ->ordered()
            ->get();

        return MenuData::collect($menuItems, 'array');
    }
}
