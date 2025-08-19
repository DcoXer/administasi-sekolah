<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PembayaranDaftarUlangController;
use App\Http\Controllers\PembayaranSppController;
use App\Models\PembayaranSpp;
use App\Livewire\UserManagement;

Route::get('/', function () {
    return redirect('/dashboard');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Siswa
    Route::get('/siswa', function () {
        return view('siswa.index');
    })->name('siswa.index');
    Route::resource('siswa', SiswaController::class)->except(['index', 'show']);
    Route::get('/siswa/export', [SiswaController::class, 'export'])->name('siswa.export');
    Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
    Route::delete('/siswa/destroy-all', [SiswaController::class, 'destroyAll'])->name('siswa.destroyAll');
    Route::get('/kelas', [SiswaController::class, 'kelasIndex'])->name('kelas.index');
    Route::get('/kelas/{kelas}', [SiswaController::class, 'kelasShow'])->name('kelas.show');

    // Guru
    Route::resource('guru', GuruController::class);
    Route::get('guru-export', [GuruController::class, 'export'])->name('guru.export');
    Route::post('guru-import', [GuruController::class, 'import'])->name('guru.import');
    Route::delete('guru-destroy-all', [GuruController::class, 'destroyAll'])->name('guru.destroyAll');

    // User Management (hanya untuk operator)
    Route::middleware(['role:operator'])->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
        Route::get('/users/export', [UserController::class, 'export'])->name('users.export');
        Route::post('/users/import', [UserController::class, 'import'])->name('users.import');
        Route::delete('/users/destroy-all', [UserController::class, 'destroyAll'])->name('users.destroyAll');
    });

    // Keuangan
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::prefix('keuangan')->middleware(['checkrole:staff_keuangan'])->group(function () {
        Route::get('/dashboard', [KeuanganController::class, 'index'])->name('keuangan.dashboard');
        Route::resource('pembayaran-spp', PembayaranSppController::class);
        Route::resource('daftar-ulang', PembayaranDaftarUlangController::class);
        Route::get('/keuangan/spp/preview-spp/{id}', [PembayaranSppController::class, 'preview'])->name('pembayaran-spp.preview');
        Route::get('/keuangan/spp/download-spp/{id}', [PembayaranSppController::class, 'download'])->name('pembayaran-spp.download');
        Route::get('/keuangan/spp/preview-daftar-ulang/{id}', [PembayaranDaftarUlangController::class, 'preview'])->name('daftar-ulang.preview');
        Route::get('/keuangan/spp/download-daftar-ulang/{id}', [PembayaranDaftarUlangController::class, 'download'])->name('daftar-ulang.download');
        Route::get('/pembayaran-daftar-ulang/export', [PembayaranDaftarUlangController::class, 'export'])->name('daftar-ulang.export');
        Route::get('/pembayaran-daftar-ulang/import', [PembayaranSppController::class, 'import'])->name('daftar-ulang.import');
    });

    // Pembayaran
    Route::resource('daftar-ulang', PembayaranDaftarUlangController::class);
    Route::resource('pembayaran-spp', PembayaranSppController::class);
});

// Public routes (tanpa auth)
Route::get('/daftar-siswa', [SiswaController::class, 'publicIndex'])->name('siswa.public');
Route::get('/daftar-guru', [GuruController::class, 'publicIndex'])->name('guru.public');
