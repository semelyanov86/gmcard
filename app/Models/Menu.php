<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\MenuType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsUri;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    protected $fillable = [
        'label',
        'url',
        'type',
        'order',
        'is_active',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByType(Builder $query, MenuType $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order');
    }

    protected function casts(): array
    {
        return [
            'url' => AsUri::class,
            'type' => MenuType::class,
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }
}
