<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\MoneyValueObjectCast;
use App\ValueObjects\MoneyValueObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\PromoType as PromoTypeEnum;
use App\Models\PromoType;

/**
 * @property int $id
 * @property MoneyValueObject $sales_order_from
 * @property MoneyValueObject $free_delivery_from
 * @property array<string, string> $smm_links
 */
class Promo extends Model
{
    /** @use HasFactory<\Database\Factories\PromoFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'promo_type_id',
        'code',
        'img',
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
        'discount',
        'user_id',
        'daily_cost',
        'payment_required',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<PromoType, $this>
     */
    public function promoType(): BelongsTo
    {
        return $this->belongsTo(PromoType::class);
    }

    /**
     * @return BelongsTo<AdvCampaign, $this>
     */
    public function advCampaign(): BelongsTo
    {
        return $this->belongsTo(AdvCampaign::class);
    }

    /**
     * @return BelongsTo<Organisation, $this>
     */
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    /**
     * @return BelongsToMany<Category, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_promo');
    }

    /**
     * @return BelongsToMany<City, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'city_promo');
    }

    /**
     * @return BelongsToMany<Address, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Address::class, 'address_promo');
    }

    /**
     * @return HasMany<PromoUsage, $this>
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
            'amount' => MoneyValueObjectCast::class,
            'sales_order_from' => MoneyValueObjectCast::class,
            'free_delivery_from' => MoneyValueObjectCast::class,
            'daily_cost' => MoneyValueObjectCast::class,
            'payment_required' => 'boolean',
            'raise_on_top_hours' => 'integer',
            'restart_after_finish_days' => 'integer',
            'crmid' => 'string',
            'type' => PromoTypeEnum::class,
        ];
    }
}
