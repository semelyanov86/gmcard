<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function organisations() {
        return $this->hasMany(Organisation::class);
    }
    
    public function promos() {
        return $this->belongsToMany(Promo::class, 'address_promo');
    }
}
