<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\UrlValueObjectCast;
use App\Enums\MenuType;
use App\Models\Builders\MenuBuilder;
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

    public function newEloquentBuilder($query): MenuBuilder
    {
        return new MenuBuilder($query);
    }

    protected function casts(): array
    {
        return [
            'url' => UrlValueObjectCast::class,
            'type' => MenuType::class,
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }
}
