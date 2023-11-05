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
        $this->gotoPage(1, 'pemakaianPage');
    }

    public function updatePeralatans()
    {
        if (auth()->user()->role == 'KepalaBengkel') {
            $this->peralatans = PeralatanAtauMesin::where('ruangan_id', auth()->user()->ruangan_id)
                ->where('kondisi', 'ditempat')
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $this->peralatans = PeralatanAtauMesin::where('ruangan_id', $this->ruangan_id)
                ->where('kondisi', 'ditempat')
                ->orderBy('id', 'DESC')
                ->get();
        }
    }

    public function updateKelas()
    {
        if (auth()->user()->role == 'Guru') {
            $this->kelas = GuruKelas::where('guru_id', auth()->user()->guru_id)
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $this->kelas = GuruKelas::where('guru_id', $this->guru_id)
                ->orderBy('id', 'DESC')
                ->get();
        }
    }
    public function render()
    {
        if (auth()->user()->role == 'KepalaBengkel') {
            $this->updatePeralatans();
            return view('livewire.admin.peralatan-mesin.pemakaian.index', [
                'ruangans' => Ruangan::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->get(),
                'peminjamans' => Pemakaian::orderBy('id', 'DESC')->paginate(10, ['*'], 'pemakaianPage'),
                'gurus' => Guru::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->get(),
                'peralatans',
                'kelas',
            ]);
        } elseif (auth()->user()->role == 'Guru') {
            $this->updateKelas();
            return view('livewire.admin.peralatan-mesin.pemakaian.index', [
                'ruangans' => Ruangan::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->get(),
                'peminjamans' => Pemakaian::orderBy('id', 'DESC')->paginate(10, ['*'], 'pemakaianPage'),
                'gurus' => Guru::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->get(),
                'peralatans',
                'kelas',
            ]);
        } else {
            return view('livewire.admin.peralatan-mesin.pemakaian.index', [
                'ruangans' => Ruangan::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->get(),
                'peminjamans' => Pemakaian::orderBy('id', 'DESC')->paginate(10, ['*'], 'pemakaianPage'),
                'gurus' => Guru::where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->get(),
                'peralatans',
                'kelas',
            ]);
        }
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
        $validatedDate = $this->validate(
            [
                'tanggal' => 'required',
                'waktu_awal' => 'required',
                'p_m_id' => 'required',
                'guru_id' => 'required',
                'kelas_id' => 'required',
                'waktu_akhir' => 'required',
            ],
            [
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'waktu_awal.required' => 'Waktu Awal tidak boleh kosong',
                'p_m_id.required' => 'Peralatan atau Mesin tidak boleh kosong',
                'guru_id.required' => 'Guru tidak boleh kosong',
                'kelas_id.required' => 'Kelas tidak boleh kosong',
                'waktu_akhir.required' => 'Waktu Akhir tidak boleh kosong',
            ],
        );

        Pemakaian::create([
            'tanggal_pemakaian' => $this->tanggal,
            'waktu_awal' => $this->waktu_awal,
            'waktu_akhir' => $this->waktu_akhir,
            'peralatan_atau_mesin_id' => $this->p_m_id,
            'guru_id' => $this->guru_id,
            'kelas_id' => $this->kelas_id,
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
        $peminjaman = Pemakaian::findOrFail($id);
        $this->peminjaman_id = $id;
        $this->tanggal = $peminjaman->tanggal_pemakaian;
        $this->waktu_awal = $peminjaman->waktu_awal;
        $this->waktu_akhir = $peminjaman->waktu_akhir;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate(
            [
                'tanggal' => 'required',
                'waktu_awal' => 'required',
                'waktu_akhir' => 'required',
            ],
            [
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'waktu_awal.required' => 'Tanggal tidak boleh kosong',
                'waktu_akhir.required' => 'Tanggal tidak boleh kosong',
            ],
        );

        $peminjaman = Pemakaian::find($this->peminjaman_id);
        $peminjaman->update([
            'tanggal_pemakaian' => $this->tanggal,
            'waktu_awal' => $this->waktu_awal,
            'waktu_akhir' => $this->waktu_akhir,
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
    public function updateStatus_pengajuan($id, $newstatus)
    {
        $pengajuan = Pemakaian::find($id);
        $pengajuan->update([
            'status_pengajuan' => $newstatus,
        ]);
    }

    public function statuspemakaian($id)
    {
        $pengajuan = Pemakaian::find($id);
        $pengajuan->update([
            'status_penggunaan' => 'Selesai',
        ]);
    }

    public function delete()
    {
        $peminjaman = Pemakaian::find($this->selectedDataId);

        if ($peminjaman) {
            $peminjaman->delete();
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
