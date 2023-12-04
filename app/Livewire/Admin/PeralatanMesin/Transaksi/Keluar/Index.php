<?php

namespace App\Livewire\Admin\PeralatanMesin\Transaksi\Keluar;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PeralatanAtauMesin;
use App\Models\PeralatanAtauMesinMasuk;
use App\Models\PeralatanAtauMesinKeluar;

class Index extends Component
{
    public $peralatan_id, $tanggal_masuk, $ruangan_id, $nama_peralatan_atau_mesin;
    use WithPagination;
    public $ruangan_byadmin;
    protected $paginationTheme = 'bootstrap';
    public $searchPeralatan;
    public function resetPage()
    {
        $this->gotoPage(1, 'peralatanPage');
    }
    public function render()
    {
        $searchPeralatan = '%' . $this->searchPeralatan . '%';

        if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin') {
            return view('livewire.admin.peralatan-mesin.transaksi.keluar.index', [
                'peralatans' => PeralatanAtauMesin::where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                    ->where('ruangan_id', $this->ruangan_byadmin)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'peralatanPage'),
            ]);
        } else {
            if (
                auth()
                    ->user()
                    ->sekolah->ruangan->pluck('id')
                    ->count() > 0
            ) {
                $peralatans = PeralatanAtauMesin::whereHas('ruangan', function ($query) {
                    $query->where('sekolah_id', auth()->user()->sekolah->id);
                })
                    ->where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                    ->where('kondisi', 'keluar')
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'peralatanPage');
                return view('livewire.admin.peralatan-mesin.transaksi.keluar.index', [
                    'peralatans' => $peralatans,
                ]);
            } else {
                return view('livewire.admin.peralatan-mesin.transaksi.keluar.index', [
                    'peralatans' => 'kosong',
                ]);
            }
        }
    }

    public function resetInputFields()
    {
        $this->tanggal_masuk = '';
    }
    public function onkembali($id)
    {
        $peralatan_keluar = PeralatanAtauMesinKeluar::find($id);
        $this->peralatan_id = $peralatan_keluar->peralatan_atau_mesin_id;
    }

    public function kembali()
    {
        $this->validate([
            'tanggal_masuk' => 'required',
        ]);
        $peralatan = PeralatanAtauMesin::find($this->peralatan_id);
        $peralatan->kondisi = 'ditempat';
        $peralatan->save();

        PeralatanAtauMesinMasuk::create([
            'tanggal_masuk' => $this->tanggal_masuk,
            'peralatan_atau_mesin_id' => $this->peralatan_id,
        ]);

        $this->resetInputFields();

        $this->alert('success', 'Berhasil Dikembalikan!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }
}
