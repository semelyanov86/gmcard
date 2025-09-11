<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class MediaData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $filename,
        public ?string $original_name = null,
        public ?string $mime_type = null,
        public ?int $size = null,
        public ?string $path = null,
    ) {}
}
