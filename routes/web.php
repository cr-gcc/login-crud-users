<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    //  Users
        Route::post('/user/add', [UserController::class, 'add'])->name('profile.add');
        Route::post('/user', [UserController::class, 'store'])->name('profile.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('profile.edit');
        Route::patch('/user', [UserController::class, 'update'])->name('profile.update');
        Route::get('/user/{id}', [UserController::class, 'show'])->name('profile.show');
        Route::delete('/user', [UserController::class, 'destroy'])->name('profile.destroy');
    //  Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
