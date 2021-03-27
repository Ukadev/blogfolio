<?php

namespace Ukadev\Blogfolio\Models;

use Illuminate\Database\Eloquent\Model;

class PostsComment extends Model
{
    protected $fillable = ['content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function toggleStatus($id, $status)
    {
        return self::where('id', $id)->update(['status' => $status]);
    }

    static public function deleteComment($id)
    {
        return self::where('id', $id)->delete();
    }
}
