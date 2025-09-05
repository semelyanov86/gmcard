<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id',
        'name',
        'owner_role',
        'inn',
        'ogrn',
        'contact',
        'contact_fio',
        'opening_hours',
        'user_id',
    ];

    protected $casts = [
        'opening_hours' => 'array',
    ];

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
