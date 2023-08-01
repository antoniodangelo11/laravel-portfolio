<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectPaoloController;
use App\Http\Controllers\Api\ProjectAndreaController;
use App\Http\Controllers\Api\ProjectDavideController;
use App\Http\Controllers\Api\ProjectSimoneController;
use App\Http\Controllers\Api\ProjectAlessioController;
use App\Http\Controllers\Api\ProjectAntonioController;

Route::get('projects', [ProjectAlessioController::class, 'index'])->name('api.projectsAlessio.index');
Route::get('projects/{project}', [ProjectAlessioController::class, 'show'])->name('api.projectsAlessio.show');

Route::get('projects', [ProjectAntonioController::class, 'index'])->name('api.projectsAntonio.index');
Route::get('projects/{project}', [ProjectAntonioController::class, 'show'])->name('api.projectsAntonio.show');

Route::get('projects', [ProjectAndreaController::class, 'index'])->name('api.projectsAndrea.index');
Route::get('projects/{project}', [ProjectAndreaController::class, 'show'])->name('api.projectsAndrea.show');

Route::get('projects', [ProjectDavideController::class, 'index'])->name('api.projectsDavide.index');
Route::get('projects/{project}', [ProjectDavideController::class, 'show'])->name('api.projectsDavide.show');

Route::get('projects', [ProjectPaoloController::class, 'index'])->name('api.projectsPaolo.index');
Route::get('projects/{project}', [ProjectPaoloController::class, 'show'])->name('api.projectsPaolo.show');

Route::get('projects', [ProjectSimoneController::class, 'index'])->name('api.projectsSimone.index');
Route::get('projects/{project}', [ProjectSimoneController::class, 'show'])->name('api.projectsSimone.show');
