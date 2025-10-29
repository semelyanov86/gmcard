<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\MenuType;
use App\ValueObjects\UrlValueObject;
use Spatie\LaravelData\Data;

final class MenuData extends Data
{
    public function __construct(
        public int $id,
        public string $label,
        public ?UrlValueObject $url,
        public MenuType $type,
        public int $order,
        public bool $is_active,
    ) {}
}
