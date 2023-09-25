<?php

use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('register', [\App\Http\Controllers\LoginController::class, 'register'])->name('auth.register');
    Route::post('register', [\App\Http\Controllers\LoginController::class, 'doRegister'])->name('auth.register.post');
});

Route::middleware('auth')->group(function () {
    Route::resource('posts', \App\Http\Controllers\PostController::class)->parameter('posts', 'post:slug');
    Route::delete('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::get('user/{user:username}', [\App\Http\Controllers\ProfileController::class, 'view'])->name('user.view');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->middleware(['password.confirm'])->name('profile.edit');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/confirm-password', function () {
        return view('auth.confirm-password');
    })->name('password.confirm');
    Route::post('/confirm-password', [\App\Http\Controllers\LoginController::class, 'confirmPassword'])->middleware(['throttle:6,1'])->name('password.confirm.post');
    Route::put('/password', [\App\Http\Controllers\LoginController::class, 'updatePassword'])->middleware(['password.confirm'])->name('password.update');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('logs', [\App\Http\Controllers\admin\LogController::class, 'index'])->name('logs.index');
    Route::resource('categories', \App\Http\Controllers\admin\CategoryController::class);
});

Route::get('/', function () {
    \Illuminate\Support\Facades\Log::info('barra');
});

