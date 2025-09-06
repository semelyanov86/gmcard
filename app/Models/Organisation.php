<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_role',
        'inn',
        'ogrn',
        'contact',
        'contact_fio',
        'opening_hours',
    ];

    protected $guarded = [
        'id',
        'user_id',
        'address_id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'opening_hours' => 'array',
        ];
    }

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
