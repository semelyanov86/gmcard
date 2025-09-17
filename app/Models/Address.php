<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Casts\PhoneNumberCast;

/**
 * @property array<string, string> $open_hours
 */
class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'open_hours',
        'phone',
        'phone_secondary',
        'website',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return HasMany<Organisation, $this>
     */
    public function organisations(): HasMany
    {
        return $this->hasMany(Organisation::class);
    }

    /**
     * @return BelongsToMany<Promo, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function promos(): BelongsToMany
    {
        return $this->belongsToMany(Promo::class, 'address_promo');
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'open_hours' => 'array',
            'phone' => PhoneNumberCast::class,
        ];
    }
}
