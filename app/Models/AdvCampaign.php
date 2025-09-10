<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdvCampaign extends Model
{
    /** @use HasFactory<\Database\Factories\AdvCampaignFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'crmid',
        'action_details',
        'deeplink',
        'avg_hold_time',
        'avg_money_transfer_time',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];


    /**
     * @phpstan-return \Illuminate\Database\Eloquent\Relations\HasMany<Promo, $this>
     */
    public function promos(): HasMany
    {
        return $this->hasMany(Promo::class);
    }

    protected function casts(): array
    {
        return [
            'action_details' => 'array',
        ];
    }
}
