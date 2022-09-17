<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::name('admin.')->prefix('admin')->group(function () {
    Route::middleware(['auth:admin'])->controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/profile', 'show')->name('profile');
        Route::get('/edit/profile', 'edit')->name('edit.profile');
        Route::post('/update/profile', 'update')->name('update.profile');
        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');
        Route::get('/users', 'usersShow')->name('users');
        Route::get('/{id}/delete', 'delete')->name('delete');
    });
    require __DIR__.'/admin.php';
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware(['auth', 'verified'])->controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/profile', 'show')->name('profile');
        Route::get('/edit/profile', 'edit')->name('edit.profile');
        Route::post('/update/profile', 'update')->name('update.profile');
        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');
    });
    require __DIR__.'/auth.php';
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
