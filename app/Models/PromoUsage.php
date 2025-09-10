<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoUsage extends Model
{
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

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'used_at' => 'datetime',
        ];
    }
}
