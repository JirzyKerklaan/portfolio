<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/projecten/{project}', [ProjectsController::class, 'show'])->name('project.show');

require __DIR__.'/auth.php';
