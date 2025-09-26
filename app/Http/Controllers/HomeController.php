<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\WorkExperience;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'transition' => 'fade',
            'projects' => Project::query()
                ->select('id', 'name', 'task', 'url', 'cover_url')
                ->get(),
            'workExperiences' => WorkExperience::get(),
        ]);
    }
}
