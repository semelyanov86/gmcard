<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    public function sender() {
        return $this->belongsTo(User::class, 'source_id');
    }
    public function receiver() {
        return $this->belongsTo(User::class, 'target_id');
    }

}
