<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;

class ProjectsController extends Controller
{
    public function show($slug)
    {
        $project = Project::query()
            ->with('technologies')
            ->where('url', $slug)
            ->firstOrFail();

        return Inertia::render('Projects/Show', [
            'project' => $project,
        ]);
    }
}
