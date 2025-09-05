<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvCampaign extends Model
{
    public function promos() {
        return $this->hasMany(Promo::class);
    }
}
