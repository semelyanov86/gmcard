<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpPost extends Model
{
    protected $table = 'help_posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];
}
