<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;



Route::get('/', function () {
    return view('welcome');
});


//  task routes
Route::resource('tasks', TaskController::class);
Route::post('tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');