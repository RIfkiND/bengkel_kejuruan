<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function akun()
    {
        return view('admin.referensi.pengguna.akun');
    }

    public function guru()
    {
        return view('admin.referensi.pengguna.guru');
    }

    public function murid()
    {
        return view('admin.referensi.pengguna.murid');
    }

    public function kelas()
    {
        return view('admin.referensi.kelolaruang.kelas');
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
        return view('admin.peralatanmesin.daftar');
    }

    public function pemeliharaan()
    {
        return view('admin.peralatanmesin.pemeliharaan');
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
