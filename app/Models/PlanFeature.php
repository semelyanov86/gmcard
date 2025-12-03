<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\PlanFeatureFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PlanFeature extends Model
{
    /** @use HasFactory<PlanFeatureFactory> */
    use HasFactory;

    protected $fillable = [
        'system_name',
        'display_name',
        'description',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsToMany<TariffPlan>
     */
    public function tariffPlans(): BelongsToMany
    {
        return $this->belongsToMany(TariffPlan::class)
            ->withPivot(['is_included'])
            ->withTimestamps();
    }
}


