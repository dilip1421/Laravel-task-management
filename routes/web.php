<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('register', [Usercontroller::class, 'register_view'])->name('register');
    Route::post('register', [Usercontroller::class, 'register']);
    Route::get('login', [Usercontroller::class, 'login_view'])->name('login');
    Route::post('login', [Usercontroller::class, 'login']);
});
Route::group(['middleware' => 'auth'], function () {
    //user 
    Route::get('dashboard', [Usercontroller::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [Usercontroller::class, 'logout'])->name('logout');

    //task management

    Route::get('task_create', [TaskController::class, 'task_create'])->name('task.create');
    Route::post('task_create', [TaskController::class, 'taskCreate']);
    Route::get('task/edit/{id}', [TaskController::class, 'task_edit'])->name('task.edit');
    Route::patch('task/edit/{id}', [TaskController::class, 'taskEdit']);

    Route::get('task/delete/{id}', [TaskController::class, 'taskDelete'])->name('task.delete');

});
