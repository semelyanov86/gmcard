<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;

class User extends Authenticatable implements FilamentUser
{
	/** @use HasFactory<\Database\Factories\UserFactory> */
	use HasFactory;

	use Notifiable;

	use HasRoles;

	use TwoFactorAuthenticatable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable = [
		'name',
        'last_name',
		'email',
		'password',
        'age',
        'email',
        'balance',
        'job',
        'job_status',
        'city',
        'country',
        'birth_date',
        'role',
        'gender',
        'code',
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
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
		];
	}

	public function canAccessPanel(Panel $panel): bool
	{
		return $this->can('access admin') || $this->hasRole('admin');
	}

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function promos() {
        return $this->hasMany(Promo::class);
    }

    public function organisations() {
        return $this->hasMany(Organisation::class);
    }

    public function bonusesSent() {
        return $this->hasMany(Bonus::class, 'source_id');
    }

    public function bonusesReceived() {
        return $this->hasMany(Bonus::class, 'target_id');
    }

    public function subscriptions() {
        return $this->hasMany(Subscription::class);
    }

    public function promoUsages() {
        return $this->hasMany(PromoUsage::class);
    }
}
