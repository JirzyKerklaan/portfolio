<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'projects' => Project::query()
                ->select('id', 'name', 'task', 'url', 'cover_url')
                ->get()
        ]);
    }
}
