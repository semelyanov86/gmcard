<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromoType extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
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

    /**
     * @return HasMany<Promo, $this>
     */
    public function promos(): HasMany
    {
        return $this->hasMany(Promo::class, 'promo_type_id');
    }
}

