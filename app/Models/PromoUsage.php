<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoUsage extends Model
{
    /** @use HasFactory<\Database\Factories\PromoUsageFactory> */
    use HasFactory;

    protected $fillable = [
        'used_at',
        'status',
    ];

    protected $guarded = [
        'id',
        'user_id',
        'promo_id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Promo, $this>
     */
    public function promo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, $this>
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
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
