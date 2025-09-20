<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'category',
        'technologies',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_technology');
    }
}
