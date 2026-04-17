<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoActionButton extends Model
{
    protected $fillable = [
        'title',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
