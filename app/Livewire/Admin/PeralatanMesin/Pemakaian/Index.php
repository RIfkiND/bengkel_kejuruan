<?php

namespace App\Livewire\Admin\PeralatanMesin\Pemakaian;

use App\Models\Guru;
use App\Models\GuruKelas;
use App\Models\Ruangan;
use Livewire\Component;
use App\Models\Pemakaian;
use Livewire\WithPagination;
use App\Models\PeralatanAtauMesin;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $tanggal, $waktu_awal, $waktu_akhir, $status_pengajuan, $status_pemakaian, $p_m_id, $guru_id, $kelas_id, $peminjaman_id, $searchRuangan, $selectedDataId, $ruangan_id;
    public $updateMode = false;

    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    public $peralatans = [];
    public $kelas = [];
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

    public function updateKelas()
    {
        $this->kelas = GuruKelas::where('guru_id', $this->guru_id)
            ->orderBy('id', 'DESC')
            ->get();
    }
    public function render()
    {
        return view('livewire.admin.peralatan-mesin.pemakaian.index', [
            'ruangans' => Ruangan::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                ->orderBy('id', 'DESC')
                ->get(),
            'peminjamans' => Pemakaian::orderBy('id', 'DESC')->paginate(10, ['*'], 'pemeliharaanPage'),
            'gurus' => Guru::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                ->orderBy('id', 'DESC')
                ->get(),
            'peralatans',
            'kelas',
        ]);
    }

    private function resetInputFields()
    {
        $this->waktu_akhir = '';
        $this->waktu_awal = '';
        $this->guru_id = '';
        $this->kelas_id = '';
        $this->p_m_id = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'tanggal' => 'required',
            'waktu_awal'=> 'required',
            'p_m_id'=> 'required',
            'guru_id'=> 'required',
            'kelas_id'=> 'required',
            'waktu_akhir'=> 'required',
        ]);

        Pemakaian::create([
            'tanggal' => $this->tanggal,
            'waktu_awal' => $this->waktu_awal,
            'peralatan_atau_mesin_id' => $this->p_m_id,
            'guru_id, $kelas_id' => $this->guru_id,
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
        $pemeliharaan = Pemakaian::findOrFail($id);
        $this->peminjaman_id = $id;
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

        $pemeliharaan = Pemakaian::find($this->peminjaman_id);
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
    public function updateStatus_pestatus_pengajuan($id)
    {
        $pemeliharaan = Pemakaian::find($id);
        if ($pemeliharaan->status_pengajuan == 'Belum Selesai') {
            $pemeliharaan->update([
                'status_pengajuan' => 'Selesai',
            ]);
        } else {
            $pemeliharaan->update([
                'status_pengajuan' => 'Belum Selesai',
            ]);
        }
    }


    public function delete()
    {
        $pemeliharaan = Pemakaian::find($this->selectedDataId);

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
