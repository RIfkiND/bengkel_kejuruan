<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\PengajuanAlatAtauBahan;

class Index extends Component
{
    public $searchPengajuan;
    
    public function render()
    {
        $searchPengajuan = '%' . $this->searchPengajuan . '%';
        return view('livewire.admin.index', [
            'pengajuans' => PengajuanAlatAtauBahan::where('nama_alat_atau_bahan', 'LIKE', $searchPengajuan)
                ->where('sekolah_id', auth()->user()->sekolah_id)
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'pengajuanPages'),
        ]);
    }
}
