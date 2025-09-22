<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\MoneyValueObjectCast;
use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bonus extends Model
{
    /** @use HasFactory<\Database\Factories\BonusFactory> */
    use HasFactory;

    protected $fillable = [
        'amount',
        'code',
        'type',
    ];

    protected $guarded = [
        'id',
        'source_id',
        'target_id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'source_id');
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'target_id');
    }

    protected function casts(): array
    {
        return [
            'amount' => MoneyValueObjectCast::class,
            'type' => PaymentType::class,
        ];
    }
}
