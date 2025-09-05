<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function promos() {
        return $this->belongsToMany(Promo::class, 'city_promo');
    }
}
