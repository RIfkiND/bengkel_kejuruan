<?php

namespace App\Livewire\Admin\AlatBahan\Transaksi\Masuk;

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
            return view('livewire.admin.alat-bahan.transaksi.masuk.index', [
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
                return view('livewire.admin.alat-bahan.transaksi.masuk.index', [
                    'alats' => AlatAtauBahan::where('nama_alat_atau_bahan', 'LIKE', $searchAlat)
                        ->where(
                            'ruangan_id',
                            auth()
                                ->user()
                                ->sekolah->ruangan->pluck('id'),
                        )
                        ->orderBy('id', 'DESC')
                        ->paginate(10, ['*'], 'alatPage'),
                    'ruangans' => Ruangan::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                ]);
            } else {
                return view('livewire.admin.alat-bahan.transaksi.masuk.index', [
                    'alats' => 'kosong',
                ]);
            }
        }
    }
}
