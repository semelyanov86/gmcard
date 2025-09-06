<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function promos() {
        return $this->belongsToMany(Promo::class, 'category_promo');
    }
}
