<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function address() {
        return $this->belongsTo(Address::class);
    }
    public function promos() {
        return $this->hasMany(Promo::class);
    }
}
