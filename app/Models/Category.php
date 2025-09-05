<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function promos() {
        return $this->belongsToMany(Promo::class, 'category_promo');
    }
}
