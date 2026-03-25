<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\MoneyValueObjectCast;
use App\ValueObjects\MoneyValueObject;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\PromoType as PromoTypeEnum;
use App\Enums\Promo\PromoModerationStatus;
use Override;


class PromoPhoto extends Model
{
    protected $fillable = [
        'promo_id',
        'path',
        'sort_order'
    ];

    public function promo(): BelongsTo
    {
       return $this->belongsTo(Promo::class);
    }
}
