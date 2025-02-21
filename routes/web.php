<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    CandidateController,
    SiswaController,
    VoteController,
    PublicController,
    LaporanController,
};
Route::get('/register', [AuthController::class, 'tampilRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'tampilLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [PublicController::class, 'index'])->name('index');


Route::middleware(['auth'])->group(function(){
    Route::resource('/admin/kandidat', CandidateController::class);
    Route::resource('/admin/siswa', SiswaController::class);
    Route::get('/voting', [VoteController::class, 'index'])->name('voting');
    Route::get('/voting/{id}/visimisi', [VoteController::class, 'visimisi'])->name('visimisi');
    Route::post('/voting', [VoteController::class, 'vote'])->name('vote');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    
    // Route::get('/admin/kandidat', [CandidateController::class, 'index'])->name('kandidat.index');
    // Route::get('/admin/kandidat/create', [CandidateController::class, 'create'])->name('kandidat.create');
    // Route::post('/admin/kandidat/create', [CandidateController::class, 'store'])->name('kandidat.store');
    // Route::get('/admin/kandidat/{id}/edit', [CandidateController::class, 'edit'])->name('kandidat.edit');
    // Route::put('/admin/kandidat/{id}/update', [CandidateController::class, 'update'])->name('kandidat.update');
    // Route::delete('/admin/kandidat/{id}/destroy', [CandidateController::class, 'destroy'])->name('kandidat.destroy');
    
    // Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    // Route::get('/admin/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    // Route::post('/admin/siswa/create', [SiswaController::class, 'store'])->name('siswa.store');
    // Route::get('/admin/siswa/id/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    // Route::put('/admin/siswa/id/update', [SiswaController::class, 'update'])->name('siswa.update');
    // Route::delete('/admin/siswa/id/destroy', [SiswaController::class, 'destroy'])->name('siswa.destroy');

});

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

