<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('projects.index');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('projects', ProjectController::class);

    Route::group(['prefix' => 'projects/{project}/tasks'], function () {
        Route::get('/', [TaskController::class, 'index'])->name('projects.tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('projects.tasks.create');
        Route::post('/', [TaskController::class, 'store'])->name('projects.tasks.store');
        Route::get('/{task}', [TaskController::class, 'show'])->name('projects.tasks.show');
        Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('projects.tasks.edit');
        Route::put('/{task}', [TaskController::class, 'update'])->name('projects.tasks.update'); // Ensure this line is present
        Route::delete('/{task}', [TaskController::class, 'destroy'])->name('projects.tasks.destroy');
        Route::get('/{task}/details', [TaskController::class, 'details'])->name('projects.tasks.details');
    });

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
});
