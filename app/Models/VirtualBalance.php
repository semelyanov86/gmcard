<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VirtualBalance extends Model
{
    /** @use HasFactory<\Database\Factories\VirtualBalanceFactory> */
    use HasFactory;

    protected $fillable = [
        'compensation_date',
        'amount',
        'type',
        'user_id',
        'description',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'compensation_date' => 'immutable_datetime',
            'amount' => 'integer',
            'type' => PaymentType::class,
        ];
    }
}

