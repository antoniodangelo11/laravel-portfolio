<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;


Route::get('projects', [ProjectController::class, 'index'])->name('api.projects.index');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('api.projects.show');

