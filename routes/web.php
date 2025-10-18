<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProjectsController;

Route::get('/', [SiteController::class, 'index']);

Route::get('/projecten/{project}', [ProjectsController::class, 'show'])->name('project.show');

require __DIR__.'/auth.php';
