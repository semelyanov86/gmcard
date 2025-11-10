<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property int $id
 * @property int|null $parent_id
 * @property bool $is_starred
 */
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use NodeTrait;

    protected $fillable = [
        'name',
        'description',
        'is_starred',
        'parent_id',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsToMany<Promo, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function promos(): BelongsToMany
    {
        return $this->belongsToMany(Promo::class, 'category_promo');
    }

    protected function casts(): array
    {
        return [
            'is_starred' => 'boolean',
        ];
    }
}
