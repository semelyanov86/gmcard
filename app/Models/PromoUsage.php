<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_id',
        'used_at',
        'user_id',
        'ip',
    ];

    protected $casts = [
        'used_at' => 'datetime',
    ];

    public function promo() {
        return $this->belongsTo(Promo::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
