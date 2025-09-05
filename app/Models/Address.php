<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function organisations() {
        return $this->hasMany(Organisation::class);
    }
    public function promos() {
        return $this->belongsToMany(Promo::class, 'address_promo');
    }
}
