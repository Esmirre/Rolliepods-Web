<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public Pages
Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('/about', function () { return view('pages.about'); })->name('about');
Route::get('/news', [PostController::class, 'news'])->name('news');
Route::get('/contact', function () { return view('pages.contact'); })->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () { return view('auth.login'); })->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
    Route::get('/register', function () { return view('auth.register'); })->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Admin-Only Routes
Route::middleware(['auth', 'can:access-admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    
    // Announcement CRUD Routes
    Route::get('/posts', [PostController::class, 'adminIndex'])->name('admin.posts');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('/inquiries', function () { return view('admin.inquiries'); })->name('admin.inquiries');
    Route::get('/settings', function () { return view('admin.settings'); })->name('admin.settings');
});
