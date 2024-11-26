<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'homeAction']);
Route::get('/projects', [ProjectsController::class, 'show'])->name('projects');
