<?php

declare(strict_types=1);

namespace App\Models\Builders;

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Builder;

/**
 * @extends Builder<Menu>
 */
class MenuBuilder extends Builder
{
    public function byType(MenuType $type): self
    {
        return $this->where('type', $type);
    }

    public function active(): self
    {
        return $this->where('is_active', true);
    }

    public function ordered(): self
    {
        return $this->orderBy('order');
    }
}
