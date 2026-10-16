<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PostController::class, 'home'])->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::get('/news', [PostController::class, 'news'])->name('news');
Route::get('/news/{post}', [PostController::class, 'show'])->name('news.show');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:10,1')->name('login.perform');
    
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    // Password Reset
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'can:access-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Post Management
        Route::get('/posts', [PostController::class, 'adminIndex'])->name('posts');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

        // Inquiries Management
        Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('inquiries');
        Route::patch('/inquiries/{inquiry}', [AdminController::class, 'updateInquiry'])->name('inquiries.update');

        // Settings
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::put('/settings/password', [AdminController::class, 'updatePassword'])->name('settings.password');
    });
