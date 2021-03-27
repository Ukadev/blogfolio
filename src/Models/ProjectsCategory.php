<?php

namespace Ukadev\Blogfolio\Models;

use Illuminate\Database\Eloquent\Model;


class ProjectsCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
