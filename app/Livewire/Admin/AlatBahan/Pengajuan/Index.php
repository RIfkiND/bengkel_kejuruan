<?php

namespace App\Livewire\Admin\AlatBahan\Pengajuan;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\PengajuanAlatAtauBahan;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_alat_atau_bahan, $tanggal, $kode, $volume, $satuan, $sumber_dana, $merk, $type, $dimensi, $image, $pengajuan_id, $searchPengajuan, $selectedPengajuanId, $imageprev;
    public $updateMode = false;

    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public function getListeners()
    {
        return ['delete'];
    }

    public function resetPage()
    {
        $this->gotoPage(1, 'pengajuanPages');
    }
    public function render()
    {
        $searchPengajuan = '%' . $this->searchPengajuan . '%';
        return view('livewire.admin.alat-bahan.pengajuan.index', [
            'pengajuans' => PengajuanAlatAtauBahan::where('nama_alat_atau_bahan', 'LIKE', $searchPengajuan)
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'pengajuanPages'),
        ]);
    }

    private function resetInputFields()
    {
        $this->nama_alat_atau_bahan = '';
        $this->image = null;
        $this->kode = '';
        $this->volume = '';
        $this->satuan = '';
        $this->sumber_dana = '';
        $this->merk = '';
        $this->type = '';
        $this->dimensi = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama_alat_atau_bahan' => 'required',
            'kode' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
            'dimensi' => 'required',
            'sumber_dana' => 'required',
            'merk' => 'required',
            'type' => 'required',
        ]);

        $validatedDate['image'] = $this->image->store('gambar_pengajuan', 'public');

        PengajuanAlatAtauBahan::create([
            'nama_alat_atau_bahan' => $this->nama_alat_atau_bahan,
            'gambar' => $validatedDate['image'],
            'kode' => $this->kode,
            'volume' => $this->volume,
            'satuan' => $this->satuan,
            'sumber_dana' => $this->sumber_dana,
            'merk' => $this->merk,
            'type_atau_model' => $this->type,
            'dimensi' => $this->dimensi,
            'tanggal' => date('Y-m-d H:i:s'),
        ]);

        $this->resetInputFields();

        $this->alert('success', 'Berhasil Ditambahkan!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function edit($id)
    {
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
        $this->sumber_dana = $pengajuan->sumber_dana;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nama_alat_atau_bahan' => 'required',
            'kode' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
            'dimensi' => 'required',
            'sumber_dana' => 'required',
            'merk' => 'required',
            'type' => 'required',
        ]);

        if ($this->image != null) {
            $validatedDate['image'] = $this->image->store('files', 'public');
            $pengajuan = PengajuanAlatAtauBahan::find($this->pengajuan_id);
            $pengajuan->update([
                'nama_alat_atau_bahan' => $this->nama_alat_atau_bahan,
                'gambar' => $validatedDate['image'],
                'kode' => $this->kode,
                'volume' => $this->volume,
                'satuan' => $this->satuan,
                'sumber_dana' => $this->sumber_dana,
                'merk' => $this->merk,
                'type_atau_model' => $this->type,
                'dimensi' => $this->dimensi,
                'tanggal' => date('Y-m-d H:i:s'),
            ]);
            Storage::disk('public')->delete($this->imageprev);
        } else {
            $pengajuan = PengajuanAlatAtauBahan::find($this->pengajuan_id);
            $pengajuan->update([
                'nama_alat_atau_bahan' => $this->nama_alat_atau_bahan,
                'kode' => $this->kode,
                'volume' => $this->volume,
                'satuan' => $this->satuan,
                'sumber_dana' => $this->sumber_dana,
                'merk' => $this->merk,
                'type_atau_model' => $this->type,
                'dimensi' => $this->dimensi,
                'tanggal' => date('Y-m-d H:i:s'),
            ]);
        }

        $this->updateMode = false;
        $this->resetInputFields();
        $this->alert('success', 'Berhasil Diubah!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    // public function updateStatus($id)
    // {
    //     $pengajuan = PengajuanAlatAtauBahan::find($id);
    //     $pengajuan->status = $pengajuan->status == 1 ? 0 : 1;
    //     $pengajuan->save();
    // }

    public function ondel($id)
    {
        $this->selectedPengajuanId = $id;

        $this->alert('question', 'Yakin Ingin di Hapus ?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'timerProgressBar' => true,
            'showCancelButton' => true,
            'cancelButtonText' => 'Tidak',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya',
            'onConfirmed' => 'delete',
            'confirmButtonColor' => '#f03535',
        ]);
    }

    public function delete()
    {
        $pengajuan = PengajuanAlatAtauBahan::find($this->selectedPengajuanId);

        if ($pengajuan) {
            Storage::disk('public')->delete($pengajuan->gambar);
            $pengajuan->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Pengajuan Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}
