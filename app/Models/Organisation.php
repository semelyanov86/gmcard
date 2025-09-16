<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\OwnerRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property array<string, string> $opening_hours
 */
class Organisation extends Model
{
    /** @use HasFactory<\Database\Factories\OrganisationFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_role',
        'inn',
        'ogrn',
        'contact',
        'contact_fio',
        'opening_hours',
    ];

    protected $guarded = [
        'id',
        'user_id',
        'address_id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, $this>
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Address, $this>
     */
    public function address(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Promo, $this>
     */
    public function promos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Promo::class);
    }

    protected function casts(): array
    {
        return [
            'opening_hours' => 'array',
            'owner_role' => OwnerRole::class,
        ];
    }
}
