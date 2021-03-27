<?php

namespace Ukadev\Blogfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasOne(PostsCategory::class);
    }

    public function comments()
    {
        return $this->hasMany(PostsComment::class);
    }
}
