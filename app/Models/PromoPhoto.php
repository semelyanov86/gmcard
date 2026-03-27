<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromoPhoto extends Model
{
    protected $fillable = [
        'promo_id',
        'path',
        'sort_order',
    ];

    /**
     * @return BelongsTo<Promo, $this>
     */
    public function promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }
}
