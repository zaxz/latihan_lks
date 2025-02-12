<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    CandidateController,
    SiswaController,
    VoteController,
    PublicController,
    AdminController,
};

Route::get('/', [PublicController::class, 'index'])->name('home');

// Public Routes
// Route::get('/results', [PublicController::class, 'results'])->name('results');

// // Authentication
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// // Student Routes
// Route::middleware(['auth', 'role:student'])->group(function () {
//     Route::get('/vote', [VoteController::class, 'show'])->name('vote.show');
//     Route::post('/vote', [VoteController::class, 'submit'])->name('vote.submit');
// });

// // Admin Routes
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::resource('candidates', CandidateController::class);
//     Route::resource('students', SiswaController::class);
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

