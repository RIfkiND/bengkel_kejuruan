<?php

namespace App\Livewire\Admin\AlatBahan\Transaksi\Keluar;

use App\Models\Ruangan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AlatAtauBahan;

class Index extends Component
{
    use WithPagination;
    public $ruangan_byadmin;
    protected $paginationTheme = 'bootstrap';
    public $searchAlat;
    public function resetPage()
    {
        $this->gotoPage(1, 'peralatanPage');
    }
    public function render()
    {
        $searchAlat = '%' . $this->searchAlat . '%';

        if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin') {
            return view('livewire.admin.alat-bahan.transaksi.keluar.index', [
                'alats' => AlatAtauBahan::where('nama_alat_atau_bahan', 'LIKE', $searchAlat)
                    ->where('ruangan_id', $this->ruangan_byadmin)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'alatPage'),
            ]);
        } else {
            if (
                auth()
                    ->user()
                    ->sekolah->ruangan->pluck('id')
                    ->count() > 0
            ) {
                $alats = AlatAtauBahan::whereHas('ruangan', function ($query) {
                    $query->where('sekolah_id', auth()->user()->sekolah->id);
                })
                    ->where('nama_alat_atau_bahan', 'LIKE', $searchAlat)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'peralatanPage');

                return view('livewire.admin.alat-bahan.transaksi.keluar.index', [
                    'alats' => $alats,
                    'ruangans' => Ruangan::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                ]);
            } else {
                return view('livewire.admin.alat-bahan.transaksi.keluar.index', [
                    'alats' => 'kosong',
                ]);
            }
        }
    }
}
