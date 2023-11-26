<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImpersonateController;

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
Route::controller(PDFController::class)->group(function () {
    Route::get('kartu-perawatan-alat', 'kartuperawatanalat')->name('print.kartuperawatanalat');
    // Route::get('daftar-inventaris-alat', 'inventarisalat')->name('print.inventarisalat');
    // Route::get('kartu-peminjaman-alat', 'kartupeminjamanalat')->name('print.kartupeminjamanalat');
    Route::get('buku-pemeliharaan-alat', 'bukupemeliharaanalat')->name('print.bukupemeliharaanalat');
    // Route::get('kartu-stok-barang', 'kartustok')->name('print.kartustok');
    Route::get('rencana-kebutuhan-alat-bahan-diklat', 'kebutuhanalatbahandiklat')->name('print.kebutuhanalatbahandiklat');
    // Route::get('buku-induk-inventaris-barang', 'bukuindukbaranginventaris')->name('print.bukuindukbaranginventaris');
    Route::get('tanda-terima-pengambilan-barang', 'tandaterimapengambilanbarang')->name('print.tandaterimapengambilanbarang');
    // Route::get('pengeluaran-barang', 'pengeluaranbarang')->name('print.pengeluaranbarang');
    Route::get('daftar-ruang-barang', 'daftarruangbarang')->name('print.daftarruangbarang');
    Route::get('laporan-kerusakan', 'laporankerusakan')->name('print.laporankerusakan');
    Route::get('serah-terima-barang', 'serahterimabarang')->name('print.serahterimabarang');
});

Route::prefix('/admin')->group(function () {
    Route::controller(ImpersonateController::class)->group(function () {
        Route::middleware(['auth', 'user-access:SuperAdmin,Admin'])->group(function () {
            Route::get('impersonate/{user}', 'impersonate')->name('admin.impersonate');
        });
        Route::get('stop-impersonating', 'stopImpersonating')->name('admin.stop-impersonating');
    });

    Route::controller(PDFController::class)->group(function () {
        Route::get('kartu-pemakaian-alat/{id}', 'kartupemakaaianalat')->name('print.kartupemakaaianalat');
        // Route::get('kartu-perawatan-alat', 'kartuperawatanalat')->name('print.kartuperawatanalat');
        Route::get('daftar-inventaris-alat/{id}', 'inventarisalat')->name('print.inventarisalat');
        Route::get('kartu-peminjaman-alat/{id}', 'kartupeminjamanalat')->name('print.kartupeminjamanalat');
        // Route::get('buku-pemeliharaan-alat', 'bukupemeliharaanalat')->name('print.bukupemeliharaanalat');
        Route::get('kartu-stok-barang/{id}', 'kartustok')->name('print.kartustok');
        // Route::get('rencana-kebutuhan-alat-bahan-diklat', 'kebutuhanalatbahandiklat')->name('print.kebutuhanalatbahandiklat');
        Route::get('buku-induk-inventaris-barang/{id}', 'bukuindukbaranginventaris')->name('print.bukuindukbaranginventaris');
        // Route::get('tanda-terima-pengambilan-barang', 'tandaterimapengambilanbarang')->name('print.tandaterimapengambilanbarang');
        Route::get('pengeluaran-barang/{id}', 'pengeluaranbarang')->name('print.pengeluaranbarang');
        // Route::get('daftar-ruang-barang', 'daftarruangbarang')->name('print.daftarruangbarang');
        // Route::get('laporan-kerusakan', 'laporankerusakan')->name('print.laporankerusakan');
        // Route::get('serah-terima-barang', 'serahterimabarang')->name('print.serahterimabarang');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.index');
        Route::middleware(['auth', 'user-access:SuperAdmin,Admin'])->group(function () {
            Route::get('sekolah', 'sekolah')->name('admin.sekolah');
            Route::prefix('sekolah')->group(function () {
                Route::get('{id}/kelas', 'kelas_sekolah')->name('admin.sekolah.kelas');
                Route::get('{id}/kelas-ruangan', 'kelas_sekolah')->name('admin.sekolah.kelas-ruangan');
                Route::prefix('kelas-ruangan')->group(function () {
                    Route::get('{id}/murid', 'murid_kelas')->name('admin.sekolah.kelas-ruangan.murid');
                });
                Route::prefix('ruangan')->group(function () {
                    Route::get('{id}/peralatan', 'peralatan_ruangan')->name('admin.sekolah.ruangan.peralatan');
                });
            });
        });
        Route::middleware(['auth', 'user-access:AdminSekolah,Admin,SuperAdmin'])->group(function () {
            Route::prefix('pengguna')->group(function () {
                Route::get('akun', 'akun')->name('admin.pengguna.akun');
                Route::get('guru', 'guru')->name('admin.pengguna.guru');
            });
        });

        Route::middleware(['auth', 'user-access:AdminSekolah,Guru'])->group(function () {
            Route::prefix('kelola-ruangan')->group(function () {
                Route::get('kelas', 'kelas')->name('admin.kelolaruangan.kelas');
                Route::prefix('kelas')->group(function () {
                    Route::get('{id}/murid', 'murid_kelas')->name('admin.kelolaruangan.murid');
                });
                Route::middleware(['auth', 'user-access:AdminSekolah'])->group(function () {
                    Route::get('ruangan', 'ruangan')->name('admin.kelolaruangan.ruangan');
                    Route::prefix('ruangan')->group(function () {
                        Route::get('{id}/peralatan', 'peralatan_ruangan')->name('admin.kelolaruangan.ruangan.peralatan');
                    });
                });
            });
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
