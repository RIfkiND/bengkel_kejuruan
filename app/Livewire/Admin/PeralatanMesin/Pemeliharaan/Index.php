<?php

namespace App\Livewire\Admin\PeralatanMesin\Pemeliharaan;

use App\Models\Ruangan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PeralatanAtauMesin;
use App\Models\PemeliharaanDanPerawatan;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $tanggal, $jenis, $status, $p_m_id, $keterangan, $pemeliharaan_id, $searchRuangan, $selectedDataId, $ruangan_id;
    public $updateMode = false;

    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    public $peralatans = [];
    protected $listeners = ['delete'];
    public function getListeners()
    {
        return ['delete'];
    }

    public function resetPage()
    {
        $this->gotoPage(1, 'pemeliharaanPage');
    }

    public function updatePeralatans()
    {
        $this->peralatans = PeralatanAtauMesin::where('ruangan_id', $this->ruangan_id)
            ->where('kondisi', 'ditempat')
            ->orderBy('id', 'DESC')
            ->get();
    }
    public function render()
    {
        $ruangan_id = $this->ruangan_id;

        return view('livewire.admin.peralatan-mesin.pemeliharaan.index', [
            'ruangans' => Ruangan::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                ->orderBy('id', 'DESC')
                ->get(),
            'pemeliharaans' => PemeliharaanDanPerawatan::orderBy('id', 'DESC')->paginate(10, ['*'], 'pemeliharaanPage'),
            'peralatans',
        ]);
    }

    private function resetInputFields()
    {
        $this->tanggal = '';
        $this->jenis = '';
        $this->status = '';
        $this->keterangan = '';
        $this->p_m_id = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'tanggal' => 'required',
            'jenis'=> 'required',
            'p_m_id'=> 'required',
            'keterangan'=> 'required',
        ]);

        PemeliharaanDanPerawatan::create([
            'tanggal' => $this->tanggal,
            'jenis' => $this->jenis,
            'peralatan_atau_mesin_id' => $this->p_m_id,
            'keterangan' => $this->keterangan,
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
        $pemeliharaan = PemeliharaanDanPerawatan::findOrFail($id);
        $this->pemeliharaan_id = $id;
        $this->tanggal = $pemeliharaan->tanggal;
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
            'tanggal' => 'required',
        ]);

        $pemeliharaan = PemeliharaanDanPerawatan::find($this->pemeliharaan_id);
        $pemeliharaan->update([
            'tanggal' => $this->tanggal,
        ]);

        $this->updateMode = false;
        $this->resetInputFields();
        $this->alert('success', 'Berhasil Diubah!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function ondel($id)
    {
        $this->selectedDataId = $id;

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
    public function updateStatus($id)
    {
        $pemeliharaan = PemeliharaanDanPerawatan::find($id);
        if ($pemeliharaan->status == 'Belum Selesai') {
            $pemeliharaan->update([
                'status' => 'Selesai',
            ]);
        } else {
            $pemeliharaan->update([
                'status' => 'Belum Selesai',
            ]);
        }
    }


    public function delete()
    {
        $pemeliharaan = PemeliharaanDanPerawatan::find($this->selectedDataId);

        if ($pemeliharaan) {
            $pemeliharaan->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Data Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}
