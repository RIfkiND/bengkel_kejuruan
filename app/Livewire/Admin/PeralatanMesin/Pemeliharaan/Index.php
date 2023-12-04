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
    public $tanggal, $jenis, $status, $p_m_id, $keterangan, $pemeliharaan_id, $searchRuangan, $selectedDataId, $ruangan_id, $petugas;
    public $updateMode = false;
    public $informasiMode = false;

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
            'pemeliharaans' => PemeliharaanDanPerawatan::whereHas('peralatan', function ($query) {
                $query->whereHas('ruangan', function ($query) {
                    $query->where('sekolah_id', auth()->user()->sekolah->id);
                });
            })
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'pemeliharaanPage'),
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
        $this->petugas = '';

    }

    public function store()
    {
        $validatedDate = $this->validate(
            [
                'tanggal' => 'required',
                'jenis' => 'required',
                'p_m_id' => 'required',
                'keterangan' => 'required',
            ],
            [
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'jenis.required' => 'Jenis Kerusakan tidak boleh kosong',
                'p_m_id.required' => 'Peralatan atau Mesin tidak boleh kosong',
                'keterangan.required' => 'Keterangan tidak boleh kosong',
            ],
        );

        PemeliharaanDanPerawatan::create([
            'tanggal' => $this->tanggal,
            'jenis' => $this->jenis,
            'peralatan_atau_mesin_id' => $this->p_m_id,
            'keterangan' => $this->keterangan,
            'petugas' => $this->petugas,
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
        $this->informasiMode = false;

        $pemeliharaan = PemeliharaanDanPerawatan::findOrFail($id);
        $this->pemeliharaan_id = $id;
        $this->tanggal = $pemeliharaan->tanggal;
        $this->jenis = $pemeliharaan->jenis;
        $this->status = $pemeliharaan->status;
        $this->keterangan = $pemeliharaan->keterangan;
        $this->updateMode = true;
    }

    public function info($id)
    {
        $this->updateMode = false;

        $pemeliharaan = PemeliharaanDanPerawatan::findOrFail($id);
        $this->pemeliharaan_id = $id;
        $this->tanggal = $pemeliharaan->tanggal;
        $this->jenis = $pemeliharaan->jenis;
        $this->status = $pemeliharaan->status;
        $this->keterangan = $pemeliharaan->keterangan;
        $this->informasiMode = true;
    }

    public function cancel()
    {
        $this->informasiMode = false;
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate(
            [
                'tanggal' => 'required',
                'jenis' => 'required',
                'keterangan' => 'required',
            ],
            [
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'jenis.required' => 'Jenis Kerusakan tidak boleh kosong',
                'keterangan.required' => 'Keterangan tidak boleh kosong',
            ],
        );

        $pemeliharaan = PemeliharaanDanPerawatan::find($this->pemeliharaan_id);
        $pemeliharaan->update([
            'tanggal' => $this->tanggal,
            'jenis' => $this->jenis,
            'keterangan' => $this->keterangan,

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
