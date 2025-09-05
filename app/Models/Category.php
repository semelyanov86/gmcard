<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'is_starred',
    ];

    public function promos() {
        return $this->belongsToMany(Promo::class, 'category_promo');
    }
}
