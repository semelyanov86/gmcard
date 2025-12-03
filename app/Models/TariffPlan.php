<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\MoneyValueObjectCast;
use Database\Factories\TariffPlanFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TariffPlan extends Model
{
    /** @use HasFactory<TariffPlanFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'price',
        'ads_count',
        'banner_price',
        'extra_ad_price',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return HasMany<User, $this>
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return BelongsToMany<PlanFeature>
     */
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(PlanFeature::class)
            ->withPivot(['is_included'])
            ->withTimestamps();
    }

    protected function casts(): array
    {
        return [
            'price' => MoneyValueObjectCast::class,
            'banner_price' => MoneyValueObjectCast::class,
            'extra_ad_price' => MoneyValueObjectCast::class,
        ];
    }
}
