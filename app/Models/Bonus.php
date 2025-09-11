<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
     * @phpstan-return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, $this>
     */
    public function sender(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'source_id');
    }

    /**
     * @phpstan-return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, $this>
     */
    public function receiver(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'target_id');
    }

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }
}
