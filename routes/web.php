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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('dashboard','index')->name('admin.index');
        Route::prefix('pengguna')->group(function(){
            Route::get('akun','akun')->name('admin.pengguna.akun');
            Route::get('guru','guru')->name('admin.pengguna.guru');
            Route::get('murid','murid')->name('admin.pengguna.murid');
        });
        Route::prefix('kelola-ruangan')->group(function(){
            Route::get('kelas','kelas')->name('admin.kelolaruangan.kelas');
            Route::get('ruangan','ruangan')->name('admin.kelolaruangan.ruangan');
        });
        Route::get('kategori-peralatan-dan-mesin','kategoriperalatan')->name('admin.kategoriperalatan');

        Route::get('peralatan-dan-mesin','peralatan')->name('admin.peralatanmesin.daftar');
        Route::get('pemeliharaan','pemeliharaan')->name('admin.peralatanmesin.pemeliharaan');
        Route::prefix('transaksi-peralatan-dan-mesin')->group(function(){
            Route::get('masuk','peralatanmasuk')->name('admin.peralatanmesin.transaksi.masuk');
            Route::get('keluar','peralatankeluar')->name('admin.peralatanmesin.transaksi.keluar');
        });

        Route::get('alat-dan-bahan','alatbahan')->name('admin.alatbahan.daftar');
        Route::get('pengajuan','pengajuan')->name('admin.alatbahan.pengajuan');
        Route::prefix('transaksi-alat')->group(function(){
            Route::get('masuk','alatmasuk')->name('admin.alatbahan.transaksi.masuk');
            Route::get('keluar','alatkeluar')->name('admin.alatbahan.transaksi.keluar');
        });
    });
});
