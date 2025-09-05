<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'crmid',
        'action_details',
        'deeplink',
        'avg_hold_time',
        'avg_money_transfer_time',
    ];

    protected $casts = [
        'action_details' => 'array',
    ];

    public function promos() {
        return $this->hasMany(Promo::class);
    }
}
