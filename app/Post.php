<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    public static function published()
    {
        return self::where('published',true);
    }

    protected $fillable = [
        'title', 'body', 'published',
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class);    
    }
    
}
