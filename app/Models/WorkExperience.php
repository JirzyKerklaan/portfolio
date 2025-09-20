<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = ['company', 'dates', 'function', 'location', 'website_link', 'website_label', 'description'];
}
