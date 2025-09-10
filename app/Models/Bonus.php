<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bonus extends Model
{
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

    public function sender()
    {
        return $this->belongsTo(User::class, 'source_id');
    }

    public function receiver()
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
