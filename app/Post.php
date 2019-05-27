<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function published()
    {
        return self::where('published',1)->get();
    }

    protected $fillable = [
        'title', 'body', 'published',
    ];

    
}
