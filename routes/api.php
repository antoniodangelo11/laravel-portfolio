<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TechnologyController;


Route::get('projects', [ProjectController::class, 'index'])->name('api.projects.index');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('api.projects.show');
Route::get('users/', [UserController::class, 'index'])->name('api.users.index');
Route::post('leads/', [LeadController::class, 'store'])->name('api.leads.store');
Route::get('types', [TypeController::class, 'index'])->name('api.types.index');
Route::get('technologies', [TechnologyController::class, 'index'])->name('api.technologies.index');

