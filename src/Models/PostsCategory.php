<?php

namespace Ukadev\Blogfolio\Models;

use Illuminate\Database\Eloquent\Model;

class PostsCategory extends Model
{
    protected $fillable = ['name'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
