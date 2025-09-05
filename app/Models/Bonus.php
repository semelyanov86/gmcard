<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'code',
        'source_id',
        'target_id',
        'type',
    ];

    public function sender() {
        return $this->belongsTo(User::class, 'source_id');
    }
    public function receiver() {
        return $this->belongsTo(User::class, 'target_id');
    }

}
