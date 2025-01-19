<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
--------------------------------------------------------------------------
 Web Routes
 --------------------------------------------------------------------------
 Here is where you can register web routes for your application. These
 routes are loaded by the RouteServiceProvider within a group which
 contains the "web" middleware group. Now create something great!

*/

Route::get('/', function () {
    return redirect('tasks');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('tasks');
});

/*
 General function names in Larval
 ------------------------------------
 index show list
 show  show one item
 create display creation form
 store to save data
 edit display edit data
 update update data
 delete delete data
*/

Route::group(['middleware'=>'auth'],function(){
        // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'tasks'], function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks');
        Route::get('/show/{task}', [TaskController::class, 'show'])->name('task');

        Route::get('/create', [TaskController::class, 'create'])->name('create');
        Route::post('/', [TaskController::class, 'store'])->name('store');

        Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('edit');
        Route::put('/{task}', [TaskController::class, 'update'])->name('update');

        Route::DELETE('/{task}', [TaskController::class, 'delete'])->name('delete');
    });

});
