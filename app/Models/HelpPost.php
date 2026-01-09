<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpPost extends Model
{
    use HasFactory;

    protected $table = 'help_posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];
}
