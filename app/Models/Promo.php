<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'code',
        'img',
        'amount',
        'description',
        'extra_conditions',
        'video_link',
        'smm_links',
        'days_availability',
        'availabe_from',
        'available_to',
        'started_at',
        'available_till',
        'show_on_home',
        'raise_on_top_hours',
        'restart_after_finish_days',
        'sales_order_from',
        'free_delivery_from',
        'free_delivery',
        'approved_at',
        'approving_notes',
        'crmid',
        'adv_campaign_id',
        'organisation_id',
        'dicsount',
    ];

    protected $guarded = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'smm_links' => 'array',
            'days_availability' => 'array',
            'availabe_from' => 'date',
            'available_to' => 'datetime',
            'started_at' => 'datetime',
            'available_till' => 'datetime',
            'show_on_home' => 'boolean',
            'free_delivery' => 'boolean',
            'approved_at' => 'datetime',
            'amount' => 'integer',
            'raise_on_top_hours' => 'integer',
            'restart_after_finish_days' => 'integer',
            'sales_order_from' => 'integer',
            'free_delivery_from' => 'integer',
            'crmid' => 'integer',
        ];
    }

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
