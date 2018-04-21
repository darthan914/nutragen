<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'slug_url', 'title', 'description', 'content', 'photo', 'flag_publish', 'author', 'id_created', 'version'
    ];
}
