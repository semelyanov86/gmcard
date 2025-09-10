<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];



    /**
     * @phpstan-return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Promo, $this, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>
     */
    public function promos(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Promo::class, 'category_promo');
    }
}
