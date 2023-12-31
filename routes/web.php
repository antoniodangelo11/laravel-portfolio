<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guests\PageController as GuestsPageController;

Route::get('/', [GuestsPageController::class, 'home'])->name('guests.home');
Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');



Route::middleware('auth', 'verified')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        

    Route::get('/project/trashed', [ProjectController::class, 'trashed'])->name('projects.trashed');
    Route::post('/project/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('/project/{project}/harddelete', [ProjectController::class, 'harddelete'])->name('projects.harddelete');
    route::post('/project/{project}/cancel', [ProjectController::class, 'cancel'])->name('projects.cancel');

    Route::resource('projects', ProjectController::class);
    Route::resource('users', UserController::class);
    Route::resource('types', TypeController::class);
    Route::resource('technologies', TechnologyController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
