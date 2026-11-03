
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Support\Facades\Route;

// Halaman awal
Route::redirect('/', '/login');

// Semua halaman yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {

    // Dashboard umum
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    // CRUD Mata Kuliah
    Route::resource('mata-kuliah', MataKuliahController::class);

    // Dashboard khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Dashboard khusus Dosen
    Route::middleware(['role:dosen'])->group(function () {
        Route::get('/dosen/dashboard', function () {
            return 'Halaman Laporan Progres (Dapat diakses Admin dan Dosen)';
        })->name('dosen.dashboard');
    });

    // Dashboard khusus Mahasiswa
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/dashboard', function () {
            return view('mahasiswa.dashboard');
        })->name('mahasiswa.dashboard');
    });

    // Admin atau Dosen
    Route::middleware(['role:admin|dosen'])->group(function () {
        Route::get('/laporan-progres', function () {
            return 'Halaman Laporan Progres (Dapat diakses Admin dan Dosen)';
        })->name('laporan.progres');
    });

});

// Route autentikasi Breeze
require __DIR__.'/auth.php';
