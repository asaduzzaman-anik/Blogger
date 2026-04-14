<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::middleware('auth')->group(function(){
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('user.logout');

    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.createForm');
    Route::post('/blogs/create', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blogs/{blog}/view', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.editForm');
    Route::patch('/blogs/{blog}/edit', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.delete');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [SessionController::class, 'create'])->name('user.loginForm');
    Route::post('/login', [SessionController::class, 'store'])->name('user.login');
    Route::get('/register', [RegistrationController::class, 'create'])->name('user.registrationForm');
    Route::post('/register', [RegistrationController::class, 'store'])->name('user.register');
});