<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;

class ProjectsController extends Controller
{
    public function show($id)
    {
        $project = Project::query()
            ->with('technologies')
            ->findOrFail($id);

        return Inertia::render('Projects/Show', [
            'project' => $project,
        ]);
    }
}
