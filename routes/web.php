<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes - Rolliepods
|--------------------------------------------------------------------------
|
| All named routes used in header.blade.php and 
| footer.blade.php are defined below.
|
*/

// =========================================================================
// 1. PUBLIC PAGES
// =========================================================================

// Home Page
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// About Us Page
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// News & Announcements Page
Route::get('/news', function () {
    return view('pages.news');
})->name('news');

// Contact Us Page
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Contact Form Submission (POST)
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


// =========================================================================
// 2. GUEST AUTHENTICATION ROUTES (Login & Sign Up)
// =========================================================================
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

    // Sign Up / Register
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
});


// =========================================================================
// 3. AUTHENTICATED USER ROUTES
// =========================================================================
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// =========================================================================
// 4. ADMIN-ONLY ROUTES (Dashboard & Management)
// =========================================================================
Route::middleware(['auth', 'can:access-admin'])->prefix('admin')->group(function () {
    
    // Main Admin Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Manage Posts & Announcements
    Route::get('/posts', function () {
        return view('admin.posts');
    })->name('admin.posts');

    // Inquiries Management
    Route::get('/inquiries', function () {
        return view('admin.inquiries');
    })->name('admin.inquiries');

    // Admin Settings
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');

});
