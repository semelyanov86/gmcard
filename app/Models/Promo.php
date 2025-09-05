<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function advCampaign() {
        return $this->belongsTo(AdvCampaign::class);
    }
    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }
    public function categories() {
        return $this->belongsToMany(Category::class, 'category_promo');
    }
    public function cities() {
        return $this->belongsToMany(City::class, 'city_promo');
    }
    public function addresses() {
        return $this->belongsToMany(Address::class, 'address_promo');
    }
    public function usages() {
        return $this->hasMany(PromoUsage::class);
    }
}
