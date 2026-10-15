<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [PostController::class, 'home'])->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::get('/news', [PostController::class, 'news'])->name('news');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');

// Guests only
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:10,1')->name('login.perform');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
});

// Logged-in users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
});

// Admin only (Gate "access-admin" is defined in AppServiceProvider)
Route::middleware(['auth', 'can:access-admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/posts', [PostController::class, 'adminIndex'])->name('admin.posts');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('admin.inquiries');
    Route::patch('/inquiries/{inquiry}', [AdminController::class, 'updateInquiry'])->name('admin.inquiries.update');

    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::put('/settings/password', [AdminController::class, 'updatePassword'])->name('admin.settings.password');
});
