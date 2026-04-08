<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class DiscountFilterOption extends Model
{
    /** @use HasFactory<\Database\Factories\DiscountFilterOptionFactory> */
    use HasFactory;

    protected $fillable = [
        'min_percent',
        'sort_order',
    ];

    #[\Override]
    public function casts(): array
    {
        return [
            'min_percent' => 'integer',
            'sort_order' => 'integer',
        ];
    }
}
