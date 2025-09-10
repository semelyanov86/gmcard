<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'country',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function promos()
    {
        return $this->belongsToMany(Promo::class, 'city_promo');
    }
}
