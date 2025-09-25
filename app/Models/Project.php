<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'name',
        'task',
        'url',
        'cover_url',
        'thumbnail_url',
        'full_site_url',
        'description',
        'client',
        'website',
        'github_url',
        'color',
    ];

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }
}
