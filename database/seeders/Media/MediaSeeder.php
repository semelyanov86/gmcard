<?php

declare(strict_types=1);

namespace Database\Seeders\Media;

use App\Models\Media as MediaModel;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['type' => 'image/jpeg'],
            ['type' => 'image/png'],
            ['type' => 'image/webp'],
            ['type' => 'image/jpeg'],
            ['type' => 'image/jpeg'],
            ['type' => 'image/png'],
            ['type' => 'image/png'],
            ['type' => 'image/jpeg'],
            ['type' => 'image/jpeg'],
            ['type' => 'image/webp'],
        ];

        foreach ($items as $data) {
            MediaModel::query()->create($data);
        }
    }
}
