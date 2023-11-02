<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.index');
        Route::get('sekolah', 'sekolah')->name('admin.sekolah');
        Route::prefix('sekolah')->group(function () {
            Route::get('{id}/kelas', 'kelas_sekolah')->name('admin.sekolah.kelas');
            Route::get('{id}/kelas-ruangan', 'kelas_sekolah')->name('admin.sekolah.kelas-ruangan');
            Route::prefix('ruangan')->group(function () {
                Route::get('{id}/peralatan', 'peralatan_ruangan')->name('admin.sekolah.ruangan.peralatan');
            });
        });
        Route::prefix('pengguna')->group(function () {
            Route::get('akun', 'akun')->name('admin.pengguna.akun');
            Route::get('guru', 'guru')->name('admin.pengguna.guru');
        });
        Route::prefix('kelola-ruangan')->group(function () {
            Route::get('kelas', 'kelas')->name('admin.kelolaruangan.kelas');
            Route::prefix('kelas')->group(function () {
                Route::get('{id}/murid', 'murid_kelas')->name('admin.kelolaruangan.murid');
            });
            Route::get('ruangan', 'ruangan')->name('admin.kelolaruangan.ruangan');
        });
        Route::get('kategori-peralatan-dan-mesin', 'kategoriperalatan')->name('admin.kategoriperalatan');

        Route::get('peralatan-dan-mesin', 'peralatan')->name('admin.peralatanmesin.daftar');
        Route::get('peminjaman', 'peminjaman')->name('admin.peralatanmesin.peminjaman');
        Route::get('pemeliharaan', 'pemeliharaan')->name('admin.peralatanmesin.pemeliharaan');
        Route::prefix('transaksi-peralatan-dan-mesin')->group(function () {
            Route::get('masuk', 'peralatanmasuk')->name('admin.peralatanmesin.transaksi.masuk');
            Route::get('keluar', 'peralatankeluar')->name('admin.peralatanmesin.transaksi.keluar');
        });

        Route::get('alat-dan-bahan', 'alatbahan')->name('admin.alatbahan.daftar');
        Route::get('pengajuan', 'pengajuan')->name('admin.alatbahan.pengajuan');
        Route::prefix('transaksi-alat')->group(function () {
            Route::get('masuk', 'alatmasuk')->name('admin.alatbahan.transaksi.masuk');
            Route::get('keluar', 'alatkeluar')->name('admin.alatbahan.transaksi.keluar');
        });
    });
});
