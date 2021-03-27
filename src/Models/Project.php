<?php

namespace Ukadev\Blogfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'content', 'image'
    ];

    public function category()
    {
        return $this->hasOne(ProjectsCategory::class);
    }
}
