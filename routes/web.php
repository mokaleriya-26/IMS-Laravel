<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showPortalSelection'])->name('portal.select');
    Route::get('/login/{role}', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Student Dashboard & Portal
    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
        Route::post('/profile', [StudentController::class, 'updateProfile'])->name('profile.update');
        Route::get('/submit-achievement', [StudentController::class, 'createAchievement'])->name('achievement.create');
        Route::post('/submit-achievement', [StudentController::class, 'storeAchievement'])->name('achievement.store');
    });

    // Faculty Verification Dashboard
    Route::middleware('role:faculty')->prefix('faculty')->name('faculty.')->group(function () {
        Route::get('/queue', [FacultyController::class, 'queue'])->name('queue');
        Route::get('/review/{achievement}', [FacultyController::class, 'review'])->name('review');
        Route::post('/review/{achievement}', [FacultyController::class, 'processReview'])->name('review.process');
    });
});