<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use App\Enums\GenderType;
use App\Enums\JobStatusType;
use App\Enums\RoleType;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use App\Casts\MoneyValueObjectCast;
use App\ValueObjects\MoneyValueObject;

/**
 * @property MoneyValueObject|null $balance
 * @property int|null $bonus_balance
 */
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    use HasRoles;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'age',
        'email',
        'job',
        'job_status',
        'city',
        'country',
        'birth_date',
        'gender',
        'code',
        'crmid',
        'tariff_plan_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be guarded from mass assignment.
     *
     * @var list<string>
     */
    protected $guarded = [
        'password',
        'balance',
        'bonus_balance',
        'virtual_balance',
        'id',
        'created_at',
        'updated_at',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->can('access admin')
            || $this->hasRole(RoleType::SUPER_ADMIN->value)
            || $this->hasRole(RoleType::ADMIN->value)
            || $this->hasRole(RoleType::MODERATOR->value);
    }

    /**
     * @return BelongsTo<TariffPlan, $this>
     */
    public function tariffPlan(): BelongsTo
    {
        return $this->belongsTo(TariffPlan::class);
    }

    /**
     * @return HasMany<Payment, $this>
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * @return HasMany<Promo, $this>
     */
    public function promos(): HasMany
    {
        return $this->hasMany(Promo::class);
    }

    /**
     * @return HasMany<Organisation, $this>
     */
    public function organisations(): HasMany
    {
        return $this->hasMany(Organisation::class);
    }

    /**
     * @return HasMany<Bonus, $this>
     */
    public function bonusesSent(): HasMany
    {
        return $this->hasMany(Bonus::class, 'source_id');
    }

    /**
     * @return HasMany<Bonus, $this>
     */
    public function bonusesReceived(): HasMany
    {
        return $this->hasMany(Bonus::class, 'target_id');
    }

    /**
     * @return HasMany<Subscription, $this>
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * @return HasMany<PromoUsage, $this>
     */
    public function promoUsages(): HasMany
    {
        return $this->hasMany(PromoUsage::class);
    }

    /**
     * @return HasMany<VirtualBalance, $this>
     */
    public function virtualBalances(): HasMany
    {
        return $this->hasMany(VirtualBalance::class);
    }

    /**
     * @return HasMany<Promo, $this>
     */
    public function activePromos(): HasMany
    {
        return $this->promos()
            ->whereNotNull('started_at')
            ->where('available_till', '>=', now());
    }

    /**
     * @return HasMany<Promo, $this>
     */
    public function completedPromos(): HasMany
    {
        return $this->promos()
            ->whereNotNull('started_at')
            ->where('available_till', '<', now());
    }

    /**
     * @return HasMany<Promo, $this>
     */
    public function draftPromos(): HasMany
    {
        return $this->promos()
            ->whereNull('started_at');
    }

    /**
     * @return HasMany<Promo, $this>
     */
    public function moderationPromos(): HasMany
    {
        return $this->promos()
            ->where('moderation_status', 'pending');
    }

    /**
     * @return HasMany<Promo, $this>
     */
    public function rejectedPromos(): HasMany
    {
        return $this->promos()
            ->where('moderation_status', 'rejected');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'immutable_datetime',
            'password' => 'hashed',
            'balance' => MoneyValueObjectCast::class,
            'bonus_balance' => 'integer',
            'virtual_balance' => 'integer',
            'birth_date' => 'date',
            'job_status' => JobStatusType::class,
            'gender' => GenderType::class,
        ];
    }
}
