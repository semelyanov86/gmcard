<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class HelpPostData extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $slug,
        public string $content,
    ) {}
}

