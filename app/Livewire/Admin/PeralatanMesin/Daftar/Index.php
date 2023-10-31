<?php

namespace App\Livewire\Admin\PeralatanMesin\Daftar;

use App\Models\Ruangan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PeralatanAtauMesin;
use App\Models\PeralatanAtauMesinMasuk;
use App\Models\KategoriPeralatanAtauMesin;
use App\Models\SpesifikasiPeralatanAtauMesin;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_peralatan_atau_mesin, $tanggal_masuk, $kategori_id, $ruangan_id, $sumber_dana, $merk, $type, $tahun, $kapasitas, $peralatan_id, $searchPeralatan, $selectedPeralatanId;
    public $updateMode = false;

    public $ruangan_byadmin;

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

        if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin') {
            return view('livewire.admin.peralatan-mesin.daftar.index', [
                'peralatans' => PeralatanAtauMesin::where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                    ->where('ruangan_id', $this->ruangan_byadmin)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'peralatanPage'),
            ]);
        } else {
            if (auth()->user()->sekolah->ruangan->pluck('id')->count() > 0) {
                return view('livewire.admin.peralatan-mesin.daftar.index', [
                    'peralatans' => PeralatanAtauMesin::where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                        ->where(
                            'ruangan_id',
                            auth()
                                ->user()
                                ->sekolah->ruangan->pluck('id'),
                        )
                        ->orderBy('id', 'DESC')
                        ->paginate(10, ['*'], 'peralatanPage'),
                    'kategories' => KategoriPeralatanAtauMesin::all(),
                    'ruangans' => Ruangan::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                ]);
            } else {
                return view('livewire.admin.peralatan-mesin.daftar.index',[
                    'peralatans' => 'kosong',
                ]);
            }
        }
    }

    private function resetInputFields()
    {
        $this->nama_peralatan_atau_mesin = '';
        $this->tanggal_masuk = '';
        $this->kategori_id = '';
        $this->ruangan_id = '';
        $this->sumber_dana = '';
        $this->merk = '';
        $this->type = '';
        $this->tahun = '';
        $this->kapasitas = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama_peralatan_atau_mesin' => 'required',
            'tanggal_masuk' => 'required',
            'kategori_id' => 'required',
            'ruangan_id' => 'required',
            'sumber_dana' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'tahun' => 'required',
            'kapasitas' => 'required',
        ]);

        $peralatan = PeralatanAtauMesin::create([
            'nama_peralatan_atau_mesin' => $this->nama_peralatan_atau_mesin,
            'kategori_id' => $this->kategori_id,
            'ruangan_id' => $this->ruangan_id,
        ]);

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
            'nama_peralatan_atau_mesin' => 'required',
        ]);

        $peralatan = PeralatanAtauMesin::find($this->peralatan_id);
        $peralatan->update([
            'nama_peralatan_atau_mesin' => $this->nama_peralatan_atau_mesin,
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
}
