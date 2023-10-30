<?php

namespace App\Livewire\Admin\PeralatanMesin\Transaksi\Masuk;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PeralatanAtauMesin;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchPeralatan;
    public function resetPage()
    {
        $this->gotoPage(1, 'peralatanPage');
    }
    public function render()
    {
        $searchPeralatan = '%' . $this->searchPeralatan . '%';

        return view('livewire.admin.peralatan-mesin.transaksi.masuk.index', [
            'peralatans' => PeralatanAtauMesin::where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'peralatanPage'),
        ]);
    }
}
