<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromoUsage extends Model
{
    /** @use HasFactory<\Database\Factories\PromoUsageFactory> */
    use HasFactory;

    protected $fillable = [
        'used_at',
        'ip',
        'user_id',
        'promo_id',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo<Promo, $this>
     */
    public function promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'used_at' => 'immutable_datetime',
        ];
    }
}
