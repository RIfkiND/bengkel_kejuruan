<?php

namespace App\Livewire\Admin\PeralatanMesin\Daftar;

use App\Models\Ruangan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PeralatanAtauMesin;
use App\Models\PeralatanAtauMesinMasuk;
use App\Models\PeralatanAtauMesinKeluar;
use App\Models\KategoriPeralatanAtauMesin;
use App\Models\SpesifikasiPeralatanAtauMesin;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_peralatan_atau_mesin, $tanggal_masuk, $kategori_id, $ruangan_id, $sumber_dana, $merk, $type, $tahun, $kapasitas, $peralatan_id, $searchPeralatan, $selectedPeralatanId;
    public $tanggal_keluar, $alasan;
    public $updateMode = false;
    public $ruangan_byadmin;
    public $keluarMode = false;

    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public function getListeners()
    {
        return ['delete'];
    }

    public function resetPage()
    {
        $this->gotoPage(1, 'peralatanPage');
    }
    public function render()
    {
        $searchPeralatan = '%' . $this->searchPeralatan . '%';

        if ($this->ruangan_byadmin !=null) {
            return view('livewire.admin.peralatan-mesin.daftar.index', [
                'peralatans' => PeralatanAtauMesin::where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                    ->where('ruangan_id', $this->ruangan_byadmin)
                    ->where('kondisi', 'ditempat')
                    ->orderBy('id', 'DESC')
                    ->paginate(9, ['*'], 'peralatanPage'),
            ]);
        } else {
            if (
                auth()
                    ->user()
                    ->sekolah->ruangan->pluck('id')
                    ->count() > 0
            ) {
                if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'Guru') {
                    $peralatans = PeralatanAtauMesin::whereHas('ruangan', function ($query) {
                        $query->where('sekolah_id', auth()->user()->sekolah->id);
                    })
                        ->where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                        ->where('kondisi', 'ditempat')
                        ->orderBy('id', 'DESC')
                        ->paginate(9, ['*'], 'peralatanPage');
                } else {
                    $peralatans = PeralatanAtauMesin::where('ruangan_id', auth()->user()->ruangan_id)
                        ->where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                        ->where('kondisi', 'ditempat')
                        ->orderBy('id', 'DESC')
                        ->paginate(9, ['*'], 'peralatanPage');
                }

                return view('livewire.admin.peralatan-mesin.daftar.index', [
                    'peralatans' => $peralatans,
                    'kategories' => KategoriPeralatanAtauMesin::all(),
                    'ruangans' => Ruangan::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                ]);
            } else {
                return view('livewire.admin.peralatan-mesin.daftar.index', [
                    'peralatans' => 'kosong',
                ]);
            }
        }
    }

    private function resetInputFields()
    {
        $this->nama_peralatan_atau_mesin = '';
        $this->kategori_id = '';
        $this->ruangan_id = '';
        $this->sumber_dana = '';
        $this->merk = '';
        $this->type = '';
        $this->kapasitas = '';
        $this->tanggal_keluar = '';
        $this->alasan = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama_peralatan_atau_mesin' => 'required',
            'tanggal_masuk' => 'required',
            'kategori_id' => 'required',
            'sumber_dana' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'tahun' => 'required',
            'kapasitas' => 'required',
        ],
        [
            'nama_peralatan_atau_mesin.required' => 'Nama Peralatan atau Mesin tidak boleh kosong',
            'tanggal_masuk.required' => 'Tanggal Masuk tidak boleh kosong',
            'kategori_id.required' => 'Kategori tidak boleh kosong',
            'sumber_dana.required' => 'Sumber Dana tidak boleh kosong',
            'merk.required' => 'Merk tidak boleh kosong',
            'type.required' => 'Type tidak boleh kosong',
            'tahun.required' => 'Tahun tidak boleh kosong',
            'kapasitas.required' => 'kapasitas tidak boleh kosong',

        ]);

        if (auth()->user()->ruangan_id) {
            $peralatan = PeralatanAtauMesin::create([
                'nama_peralatan_atau_mesin' => $this->nama_peralatan_atau_mesin,
                'kategori_id' => $this->kategori_id,
                'ruangan_id' => auth()->user()->ruangan_id,
            ]);
        } else {
            $validate = $this->validate([
                'ruangan_id' => 'required',
            ],
            [
                'ruangan_id.required' => 'Ruangan tidak boleh kosong',
            ]);

            $peralatan = PeralatanAtauMesin::create([
                'nama_peralatan_atau_mesin' => $this->nama_peralatan_atau_mesin,
                'kategori_id' => $this->kategori_id,
                'ruangan_id' => $this->ruangan_id,
            ]);
        }

        PeralatanAtauMesinMasuk::create([
            'tanggal_masuk' => $this->tanggal_masuk,
            'peralatan_atau_mesin_id' => $peralatan->id,
            'sumber_dana' => $this->sumber_dana,
        ]);

        SpesifikasiPeralatanAtauMesin::create([
            'merk' => $this->merk,
            'tipe_atau_model' => $this->type,
            'tahun' => $this->tahun,
            'kapasitas' => $this->kapasitas,
            'p_atau_m_id' => $peralatan->id,
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
        $peralatan = PeralatanAtauMesin::findOrFail($id);
        $this->peralatan_id = $id;
        $this->nama_peralatan_atau_mesin = $peralatan->nama_peralatan_atau_mesin;
        $this->kategori_id = $peralatan->kategori_id;
        $this->ruangan_id = $peralatan->ruangan_id;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->keluarMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nama_peralatan_atau_mesin' => 'required',
            'kategori_id' => 'required',
            'ruangan_id' => 'required',
        ],
        [
            'nama_peralatan_atau_mesin.required' => 'Nama Peralatan atau Mesin tidak boleh kosong',
            'kategori_id.required' => 'Kategori tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
        ]);

        $peralatan = PeralatanAtauMesin::find($this->peralatan_id);
        $peralatan->update([
            'nama_peralatan_atau_mesin' => $this->nama_peralatan_atau_mesin,
            'kategori_id' => $this->kategori_id,
            'ruangan_id' => $this->ruangan_id,
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
        $this->selectedPeralatanId = $id;

        $this->alert('question', 'Data Masuk,Keluar,Peminjaman Juga Akan Terhapus !! <br> Yakin Akan Di Hapus ?', [
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
        $peralatan = PeralatanAtauMesin::find($this->selectedPeralatanId);

        if ($peralatan) {
            $peralatan->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Peralatan Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function onkel($id)
    {
        $peralatan = PeralatanAtauMesin::findOrFail($id);
        $this->peralatan_id = $id;
        $this->keluarMode = true;
    }

    public function keluar()
    {
        $validate = $this->validate([
            'tanggal_keluar' => 'required',
            'alasan' => 'required',
        ],
        [
            'tanggal_keluar.required' => 'Tanggan Keluar tidak boleh kosong',
            'alasan.required' => 'Alasan tidak boleh kosong',
        ]);

        $peralatan = PeralatanAtauMesin::find($this->peralatan_id);
        $peralatan->update([
            'kondisi' => 'keluar',
        ]);

        PeralatanAtauMesinKeluar::create([
            'tanggal_keluar' => $this->tanggal_keluar,
            'peralatan_atau_mesin_id' => $peralatan->id,
            'alasan_keluar' => $this->alasan,
        ]);

        $this->keluarMode = false;
        $this->resetInputFields();
        $this->alert('success', 'Berhasil Diubah!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function status($id)
    {
        $peralatan = PeralatanAtauMesin::find($id);
        if ($peralatan->status == 'Tersedia') {
            $peralatan->update([
                'status' => 'Digunakan',
            ]);
        } else {
            $peralatan->update([
                'status' => 'Tersedia',
            ]);
        }
    }
}
