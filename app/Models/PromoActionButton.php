<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

class PromoActionButton extends Model
{
    /** @use HasFactory<\Database\Factories\PromoActionButtonFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'is_active',
        'sort_order',
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
