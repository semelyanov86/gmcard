<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'open_hours',
        'phone',
        'phone_secondary',
        'website',
    ];

    public function organisations() {
        return $this->hasMany(Organisation::class);
    }
    public function promos() {
        return $this->belongsToMany(Promo::class, 'address_promo');
    }
}
