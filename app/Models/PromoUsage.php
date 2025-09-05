<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoUsage extends Model
{
    public function promo() {
        return $this->belongsTo(Promo::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
