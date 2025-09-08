<?php

namespace App\Data;

use App\Models\Media;
use Spatie\LaravelData\Data;

class MediaData extends Data
{
	public function __construct(
		public ?int $id,
		public string $filename,
		public ?string $original_name,
		public ?string $mime_type,
		public ?int $size,
		public ?string $path,
	)
	{}
}
