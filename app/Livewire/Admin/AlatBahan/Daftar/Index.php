<?php

namespace App\Livewire\Admin\AlatBahan\Daftar;

use App\Models\AlatAtauBahanKeluar;
use App\Models\AlatAtauBahanMasuk;
use App\Models\Ruangan;
use App\Models\SpesifikasiAlatAtauBahan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AlatAtauBahan;
use Illuminate\Auth\Events\Validated;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_alat_atau_bahan, $tanggal_masuk, $kode, $ruangan_id, $volume, $satuan, $sumber_dana, $merk, $type, $dimensi, $alat_id, $searchAlat, $selectedAlatId, $saldo;
    public $tanggal_keluar, $keterangan, $nama_pemakai, $volume_keluar, $volume_masuk;
    public $updateMode = false;
    public $historyData, $alathistory;
    public $ruangan_byadmin;
    public $keluarMode = false;
    public $masukMode = false;

    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public function mount(AlatAtauBahan $alathistory)
    {
        $this->alathistory = $alathistory;
    }
    protected $listeners = ['delete'];
    public function getListeners()
    {
        return ['delete'];
    }

    public function resetPage()
    {
        $this->gotoPage(1, 'alatPage');
    }
    public function render()
    {
        $searchAlat = '%' . $this->searchAlat . '%';

        if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin') {
            return view('livewire.admin.alat-bahan.daftar.index', [
                'alats' => AlatAtauBahan::where('nama_alat_atau_bahan', 'LIKE', $searchAlat)
                    ->where('ruangan_id', $this->ruangan_byadmin)
                    ->orderBy('id', 'DESC')
                    ->paginate(9, ['*'], 'alatPage'),
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

                return view('livewire.admin.alat-bahan.daftar.index', [
                    'alats' => $alats,
                    'ruangans' => Ruangan::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                ]);
            } else {
                return view('livewire.admin.alat-bahan.daftar.index', [
                    'alats' => 'kosong',
                ]);
            }
        }
    }

    private function resetInputFields()
    {
        $this->nama_alat_atau_bahan = '';
        $this->kode = '';
        $this->ruangan_id = '';
        $this->sumber_dana = '';
        $this->merk = '';
        $this->type = '';
        $this->dimensi = '';
        $this->tanggal_keluar = '';
        $this->keterangan = '';
        $this->nama_pemakai = '';
        $this->satuan = '';
        $this->saldo = '';
        $this->volume = '';
        $this->volume_keluar = '';
        $this->volume_masuk = '';
    }

    public function store()
    {
        $validatedDate = $this->validate(
            [
                'nama_alat_atau_bahan' => 'required',
                'kode' => 'required',
                'ruangan_id' => 'required',
                'volume' => 'required',
                'satuan' => 'required',
                'sumber_dana' => 'required',
                'saldo' => 'required',
                'tanggal_masuk' => 'required',
                'merk' => 'required',
                'type' => 'required',
                'dimensi' => 'required',
            ],
            [
                'nama_alat_atau_bahan.required' => 'Nama Alat atau Bahan tidak boleh kosong.',
                'nama_alat_atau_bahan.unique' => 'Nama Alat atau Bahan sudah ada.',
                'kode.required' => 'Kode tidak boleh kosong.',
                'ruangan_id.required' => 'Ruangan tidak boleh kosong.',
                'volume.required' => 'Volume tidak boleh kosong.',
                'satuan.required' => 'Satuan tidak boleh kosong.',
                'sumber_dana.required' => 'Sumber Dana tidak boleh kosong.',
                'saldo.required' => 'Saldo tidak boleh kosong.',
                'tanggal_masuk.required' => 'Tanggal Masuk tidak boleh kosong.',
                'merk.required' => 'Merk tidak boleh kosong.',
                'type.required' => 'Type tidak boleh kosong.',
                'dimensi.required' => 'Dimensi tidak boleh kosong.',
            ],
        );

        $alat = AlatAtauBahan::create([
            'nama_alat_atau_bahan' => $this->nama_alat_atau_bahan,
            'kode' => $this->kode,
            'ruangan_id' => $this->ruangan_id,
            'volume' => $this->volume,
            'satuan' => $this->satuan,
        ]);

        AlatAtauBahanMasuk::create([
            'tanggal_masuk' => $this->tanggal_masuk,
            'alat_atau_bahan_id' => $alat->id,
            'saldo' => $this->saldo,
            'volume' => $this->volume,
            'sumber_dana' => $this->sumber_dana,
        ]);

        SpesifikasiAlatAtauBahan::create([
            'merk' => $this->merk,
            'tipe_atau_model' => $this->type,
            'dimensi' => $this->dimensi,
            'a_atau_b_id' => $alat->id,
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
        $alat = AlatAtauBahan::findOrFail($id);
        $this->alat_id = $id;
        $this->nama_alat_atau_bahan = $alat->nama_alat_atau_bahan;
        $this->kode = $alat->kode;
        $this->ruangan_id = $alat->ruangan_id;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->keluarMode = false;
        $this->masukMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nama_alat_atau_bahan' => 'required',
            'kode' => 'required',
            'ruangan_id' => 'required',
            'satuan' => 'required',
        ],
        [
            'nama_alat_atau_bahan.required' => 'Nama alat atau bahan tidak boleh kosong',
            'kode.required' => 'Kode tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
            'satuan.required' => 'Satuan tidak boleh kosong',
        ]);

        $alat = AlatAtauBahan::find($this->alat_id);
        $alat->update([
            'nama_alat_atau_bahan' => $this->nama_alat_atau_bahan,
            'kode' => $this->kode,
            'ruangan_id' => $this->ruangan_id,
            'satuan' => $this->satuan,
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
        $this->selectedAlatId = $id;

        $this->alert('question', 'Data Masuk dan Keluar Juga Akan Terhapus !! <br> Yakin Akan Di Hapus ?', [
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
        $alat = AlatAtauBahan::find($this->selectedAlatId);

        if ($alat) {
            $alat->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'alat Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function onmas($id)
    {
        $alat = AlatAtauBahan::findOrFail($id);
        $this->alat_id = $id;
        $this->volume = $alat->volume;
        $this->masukMode = true;
    }

    public function masuk()
    {
        $validate = $this->validate([
            'tanggal_masuk' => 'required',
            'volume_masuk' => 'required',
            'sumber_dana' => 'required',
            'saldo' => 'required',
        ],
        [
            'tanggal_masuk.required' => 'Tanggal Masuk tidak boleh kosong',
            'volume_masuk.required' => 'Volume tidak boleh kosong',
            'sumber_dana.required' => 'Sumber Dana tidak boleh kosong',
            'saldo.required' => 'Saldo tidak boleh kosong',
        ]);

        $sumvolume = $this->volume + $this->volume_masuk;

        $alat = AlatAtauBahan::find($this->alat_id);
        $alat->update([
            'volume' => $sumvolume,
        ]);

        AlatAtauBahanMasuk::create([
            'tanggal_masuk' => $this->tanggal_masuk,
            'alat_atau_bahan_id' => $this->alat_id,
            'saldo' => $this->saldo,
            'volume' => $this->volume_masuk,
            'sumber_dana' => $this->sumber_dana,
        ]);

        $this->masukMode = false;
        $this->resetInputFields();
        $this->alert('success', 'Berhasil Ditambahkan!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }
    public function onkel($id)
    {
        $alat = AlatAtauBahan::findOrFail($id);
        $this->alat_id = $id;
        $this->volume = $alat->volume;
        $this->keluarMode = true;
    }

    public function keluar()
    {
        $validate = $this->validate([
            'tanggal_keluar' => 'required',
            'nama_pemakai' => 'required',
            'volume_keluar' => 'required',
            'keterangan' => 'required',
        ],
        [
            'tanggal_keluar.required' => 'Tanggal Keluar tidak boleh kosong',
            'nama_pemakai.required' => 'Nama Pemakai tidak boleh kosong',
            'volume_keluar.required' => 'Volume tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
        ]);

        $sumvolume = $this->volume - $this->volume_keluar;

        $alat = AlatAtauBahan::find($this->alat_id);
        $alat->update([
            'volume' => $sumvolume,
        ]);

        AlatAtauBahanKeluar::create([
            'tanggal_keluar' => $this->tanggal_keluar,
            'alat_atau_bahan_id' => $this->alat_id,
            'nama_pemakai' => $this->nama_pemakai,
            'keterangan' => $this->keterangan,
            'volume' => $this->volume_keluar,
        ]);

        $this->keluarMode = false;
        $this->resetInputFields();
        $this->alert('success', 'Berhasil !', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function history($id)
    {
        $alathistory = AlatAtauBahan::with('alatmasuk', 'alatkeluar')->find($id);

        $this->historyData = $alathistory;
    }
}
