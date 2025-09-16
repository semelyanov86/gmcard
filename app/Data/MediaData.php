<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\MediaType;
use Spatie\LaravelData\Data;

final class MediaData extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?MediaType $type = null,
    ) {}
}
