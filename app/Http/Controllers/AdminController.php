<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Ruangan;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.index');
    }

    public function akun()
    {
        return view('admin.referensi.pengguna.akun');
    }

    public function sekolah()
    {
        return view('admin.referensi.sekolah');
    }

    public function guru()
    {
        return view('admin.referensi.pengguna.guru');
    }

    public function kelas()
    {
        $sekolah = null;
        return view('admin.referensi.kelolaruang.kelas', compact('sekolah'));
    }

    public function kelas_sekolah($id)
    {
        $sekolah = Sekolah::find($id);
        return view('admin.referensi.kelolaruang.kelas', compact('sekolah'));
    }

    public function murid_kelas($id)
    {
        $kelas = Kelas::find($id);
        return view('admin.referensi.kelolaruang.murid.daftar', compact('kelas'));
    }

    public function ruangan()
    {
        return view('admin.referensi.kelolaruang.ruangan');
    }

    public function kategoriperalatan()
    {
        return view('admin.referensi.kategoriperalatan');
    }

    public function peralatan()
    {
        $ruangan = null;
        return view('admin.peralatanmesin.daftar', compact('ruangan'));
    }

    public function peralatan_ruangan($id)
    {
        $ruangan = Ruangan::find($id);
        return view('admin.peralatanmesin.daftar', compact('ruangan'));
    }

    public function pemeliharaan()
    {
        return view('admin.peralatanmesin.pemeliharaan');
    }

    public function pemakaian()
    {
        return view('admin.peralatanmesin.pemakaian');
    }

    public function peralatanmasuk()
    {
        return view('admin.peralatanmesin.transaksi.masuk');
    }

    public function peralatankeluar()
    {
        return view('admin.peralatanmesin.transaksi.keluar');
    }

    public function alatbahan()
    {
        return view('admin.alatbahan.daftar');
    }

    public function pengajuan()
    {
        return view('admin.alatbahan.pengajuan');
    }

    public function alatmasuk()
    {
        return view('admin.alatbahan.transaksi.masuk');
    }

    public function alatkeluar()
    {
        return view('admin.alatbahan.transaksi.keluar');
    }
}
