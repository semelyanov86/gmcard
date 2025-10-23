<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\MenuType;
use Illuminate\Support\Uri;
use Spatie\LaravelData\Data;

final class MenuData extends Data
{
    public function __construct(
        public int $id,
        public string $label,
        public Uri $url,
        public MenuType $type,
        public int $order,
        public bool $is_active,
    ) {}
}
