<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\MoneyValueObjectCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TariffPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'ads_count',
        'banner_price',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return HasMany<User>
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    protected function casts(): array
    {
        return [
            'price' => MoneyValueObjectCast::class,
            'banner_price' => MoneyValueObjectCast::class,
        ];
    }
}
