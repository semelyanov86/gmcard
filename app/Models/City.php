<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
    ];

    public function promos() {
        return $this->belongsToMany(Promo::class, 'city_promo');
    }
}
