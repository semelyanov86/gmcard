<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\PromoType;

/**
 * @property array<string, string> $smm_links
 */
class Promo extends Model
{
    /** @use HasFactory<\Database\Factories\PromoFactory> */
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
        'user_id',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<AdvCampaign, $this>
     */
    public function advCampaign(): BelongsTo
    {
        return $this->belongsTo(AdvCampaign::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Organisation, $this>
     */
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Category, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_promo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<City, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'city_promo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Address, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function addresses(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Address::class, 'address_promo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<PromoUsage, $this>
     */
    public function usages(): HasMany
    {
        return $this->hasMany(PromoUsage::class);
    }

    protected function casts(): array
    {
        return [
            'smm_links' => 'array',
            'days_availability' => 'array',
            'availabe_from' => 'date',
            'available_to' => 'datetime',
            'started_at' => 'immutable_datetime',
            'available_till' => 'immutable_datetime',
            'show_on_home' => 'boolean',
            'free_delivery' => 'boolean',
            'approved_at' => 'immutable_datetime',
            'amount' => 'integer',
            'raise_on_top_hours' => 'integer',
            'restart_after_finish_days' => 'integer',
            'sales_order_from' => 'integer',
            'free_delivery_from' => 'integer',
            'crmid' => 'string',
            'type' => PromoType::class,
        ];
    }
}
