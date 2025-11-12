<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    DashboardController,
    SiswaController,
    GuruController,
    KeuanganController,
    PembayaranDaftarUlangController,
    PembayaranSppController,
    MutasiSiswaController,
    PersetujuanMutasiController,
    BidangStudiController,
    NilaiController,
    RaportController
};
use App\Livewire\{
    MutasiSiswaIndex,
    MutasiApproval,
    MutasiApprovalTable,
    UserManagement
};

// =======================================
// Public Routes
// =======================================
Route::get('/', fn() => view('welcome'))->name('welcome');

Route::get('/daftar-siswa', [SiswaController::class, 'publicIndex'])->name('siswa.public');
Route::get('/daftar-guru', [GuruController::class, 'publicIndex'])->name('guru.public');

// =======================================
// Authenticated Routes
// =======================================
require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

    // --------------------
    // Dashboard & Profile
    // --------------------
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
        Route::post('/profile/photo', 'updatePhoto')->name('profile.photo.update');
    });

    // --------------------
    // Data Siswa
    // --------------------
    Route::prefix('siswa')->group(function () {
        Route::get('/', fn() => view('siswa.index'))->name('siswa.index');
        Route::get('/export', [SiswaController::class, 'export'])->name('siswa.export');
        Route::post('/import', [SiswaController::class, 'import'])->name('siswa.import');
        Route::delete('/destroy-all', [SiswaController::class, 'destroyAll'])->name('siswa.destroyAll');
    });

    Route::resource('siswa', SiswaController::class)->except(['index', 'show']);
    Route::get('/kelas', [SiswaController::class, 'kelasIndex'])->name('kelas.index');
    Route::get('/kelas/{kelas}', [SiswaController::class, 'kelasShow'])->name('kelas.show');

    // --------------------
    // Data Guru
    // --------------------
    Route::resource('guru', GuruController::class);
    Route::get('/guru-export', [GuruController::class, 'export'])->name('guru.export');
    Route::post('/guru-import', [GuruController::class, 'import'])->name('guru.import');
    Route::delete('/guru-destroy-all', [GuruController::class, 'destroyAll'])->name('guru.destroyAll');

    // --------------------
    // Role: Operator
    // --------------------
    Route::middleware(['role:operator'])->group(function () {
        // User Management
        Route::resource('users', UserController::class)->except(['show']);
        Route::get('/users/export', [UserController::class, 'export'])->name('users.export');
        Route::post('/users/import', [UserController::class, 'import'])->name('users.import');
        Route::delete('/users/destroy-all', [UserController::class, 'destroyAll'])->name('users.destroyAll');

        // Mutasi (Operator)
        Route::prefix('mutasi')->group(function () {
            Route::get('/mutasi-siswa', function () {
                return view('livewire.mutasi-siswa');
            })->name('mutasi-siswa.index');
            Route::get('/create', [MutasiSiswaController::class, 'create'])->name('mutasi.create');
            Route::post('/', [MutasiSiswaController::class, 'store'])->name('mutasi.store');
        });
    });

    // --------------------
    // Role: Kepala Sekolah
    // --------------------
    Route::middleware(['role:kepala_sekolah'])->group(function () {
        // Persetujuan Mutasi
        //Route::prefix('mutasi')->group(function () {
          //  Route::get('/', [MutasiApproval::class, 'index'])->name('mutasi.approval');
          //  Route::get('/{id}', [PersetujuanMutasiController::class, 'show'])->name('kepsek.mutasi.show');
          //  Route::put('/{id}', [PersetujuanMutasiController::class, 'update'])->name('kepsek.mutasi.update');
        //});

        // Livewire Approval Mutasi
        Route::get('/mutasi-approval', MutasiApproval::class)->name('mutasi.approval');

        // Bidang Studi Management
        Route::resource('bidang-studi', BidangStudiController::class);
    });

    // --------------------
    // Role: Staff Keuangan
    // --------------------
    Route::prefix('keuangan')->middleware(['checkrole:staff_keuangan'])->group(function () {
        Route::get('/dashboard', [KeuanganController::class, 'index'])->name('keuangan.dashboard');

        // Pembayaran SPP
        Route::resource('pembayaran-spp', PembayaranSppController::class)->except(['show']);
        Route::get('pembayaran-spp/preview/{id}', [PembayaranSppController::class, 'preview'])->name('pembayaran-spp.preview');
        Route::get('pembayaran-spp/download/{id}', [PembayaranSppController::class, 'download'])->name('pembayaran-spp.download');
        Route::get('pembayaran-spp/export', [PembayaranSppController::class, 'export'])->name('pembayaran-spp.export');
        Route::get('pembayaran-spp/import', [PembayaranSppController::class, 'import'])->name('pembayaran-spp.import');

        // Pembayaran Daftar Ulang
        Route::resource('daftar-ulang', PembayaranDaftarUlangController::class)->except(['show']);
        Route::get('daftar-ulang/preview/{id}', [PembayaranDaftarUlangController::class, 'preview'])->name('daftar-ulang.preview');
        Route::get('daftar-ulang/download/{id}', [PembayaranDaftarUlangController::class, 'download'])->name('daftar-ulang.download');
        Route::get('daftar-ulang/export', [PembayaranDaftarUlangController::class, 'export'])->name('daftar-ulang.export');
        Route::get('daftar-ulang/import', [PembayaranSppController::class, 'import'])->name('daftar-ulang.import');
    });

    // --------------------
    // Role: Guru Bidang & Wali Kelas
    // --------------------
    Route::prefix('nilai')->middleware(['checkrole:guru'])->group(function () {
        Route::get('/', [NilaiController::class, 'index'])->name('nilai.index');
        Route::get('/{guruBidangId}/input', [NilaiController::class, 'inputNilai'])->name('nilai.input');
        Route::post('/{guruBidangId}', [NilaiController::class, 'storeNilai'])->name('nilai.store');
        Route::get('/{nilaiId}/edit', [NilaiController::class, 'editNilai'])->name('nilai.edit');
        Route::put('/{nilaiId}', [NilaiController::class, 'updateNilai'])->name('nilai.update');
    });

    Route::prefix('raport')->middleware(['checkrole:guru'])->group(function () {
        Route::get('/', [RaportController::class, 'index'])->name('raport.index');
        Route::get('/create', [RaportController::class, 'create'])->name('raport.create');
        Route::post('/', [RaportController::class, 'store'])->name('raport.store');
        Route::get('/{raport}', [RaportController::class, 'show'])->name('raport.show');
        Route::get('/{raport}/edit', [RaportController::class, 'edit'])->name('raport.edit');
        Route::put('/{raport}', [RaportController::class, 'update'])->name('raport.update');
        Route::get('/{raport}/print', [RaportController::class, 'printPdf'])->name('raport.print');
        Route::delete('/{raport}', [RaportController::class, 'destroy'])->name('raport.destroy');
    });

    // --------------------
    // Pembayaran Umum
    // --------------------
    Route::resource('daftar-ulang', PembayaranDaftarUlangController::class);
    Route::resource('pembayaran-spp', PembayaranSppController::class);
});
