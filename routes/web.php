<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

//User Controller
Route::controller(UserController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('user/dashboard', 'dashboard')->name('user.dashboard');
    Route::get('user/logout', 'logout')->name('user.logout');
    Route::get('user/profile', 'show')->name('user.profile');
    Route::get('user/edit/profile', 'edit')->name('user.edit.profile');
    Route::post('user/update/profile', 'update')->name('user.update.profile');
    Route::get('user/change/password', 'changePassword')->name('user.change.password');
    Route::post('user/update/password', 'updatePassword')->name('user.update.password');
});

//Task Controlller
Route::controller(TaskController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('task/create', 'create')->name('task.create');
    Route::post('task/store', 'store')->name('task.store');
    Route::get('task/all', 'show')->name('task.show');
    Route::get('task/{id}/edit', 'edit')->name('task.edit');
    Route::post('task/update', 'update')->name('task.update');
    Route::get('task/{id}/delete', 'delete')->name('task.delete');
    Route::get('task/{id}/detail', 'detail')->name('task.detail');
});
require __DIR__ . '/auth.php';
