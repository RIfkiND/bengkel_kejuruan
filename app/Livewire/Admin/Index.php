<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\PengajuanAlatAtauBahan;

class Index extends Component
{
    public $nama_alat_atau_bahan, $nama_pengaju, $tanggal, $kode, $volume, $satuan, $sumber_dana, $merk, $type, $dimensi, $image, $pengajuan_id, $searchPengajuan, $selectedPengajuanId, $imageprev;
    public $updateMode = false;
    public $informasiMode = false;
    
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

    public function info($id)
    {
        $this->selectedPengajuanId = $id;
        $pengajuan = PengajuanAlatAtauBahan::findOrFail($id);
        $this->pengajuan_id = $id;
        $this->nama_alat_atau_bahan = $pengajuan->nama_alat_atau_bahan;
        $this->imageprev = $pengajuan->gambar;
        $this->type = $pengajuan->type_atau_model;
        $this->dimensi = $pengajuan->dimensi;
        $this->merk = $pengajuan->merk;
        $this->kode = $pengajuan->kode;
        $this->volume = $pengajuan->volume;
        $this->satuan = $pengajuan->satuan;
        $this->nama_pengaju = $pengajuan->guru->nama_guru;
        $this->informasiMode = true;
    }

    public function updateStatus($newStatus)
    {
        $pengajuan = PengajuanAlatAtauBahan::find($this->selectedPengajuanId);

        if (in_array($newStatus, ['Diterima', 'Ditolak'])) {
            $pengajuan->status = $newStatus;
            $pengajuan->save();
            $this->alert('success', 'Berhasil ' . $newStatus . ' !', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
    
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->informasiMode = false;
    }

    private function resetInputFields()
    {
        $this->nama_alat_atau_bahan = '';
        $this->image = null;
        $this->kode = '';
        $this->volume = '';
        $this->satuan = '';
        $this->merk = '';
        $this->type = '';
        $this->dimensi = '';
    }
}
