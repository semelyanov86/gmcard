<?php

declare(strict_types=1);

namespace App\Enums;

enum MediaType: string
{
    case IMAGE_JPEG = 'image/jpeg';
    case IMAGE_PNG = 'image/png';
    case IMAGE_WEBP = 'image/webp';
    case IMAGE_GIF = 'image/gif';
    case IMAGE_SVG = 'image/svg+xml';
} 