<?php

declare(strict_types=1);

namespace App\Models\Builders;

use App\Enums\MenuType;
use Illuminate\Database\Eloquent\Builder;

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
