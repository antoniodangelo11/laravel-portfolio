<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ProjectController;


Route::get('projects', [ProjectController::class, 'index'])->name('api.projects.index');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('api.projects.show');
Route::post('leads/', [LeadController::class, 'store'])->name('api.leads.store');

