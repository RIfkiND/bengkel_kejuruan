<?php

namespace App\Livewire\Admin\Referensi\KelolaRuangan\Kelas\Murid;

use App\Models\Guru;
use App\Models\GuruKelas;
use App\Models\Kelas;
use App\Models\Murid;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_murid, $murid_id, $kelas_id, $searchMurid, $selectedMuridId;
    public $updateMode = false;
    public $guru_ids = [];

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
        $this->gotoPage(1, 'muridPage');
        $this->gotoPage(1, 'guruPage');
    }
    public function render()
    {
        $searchMurid = '%' . $this->searchMurid . '%';
        if ((auth()->user()->role = ('AdminSekolah' or (auth()->user()->role = 'Guru'))) or (auth()->user()->role = 'KepalaBengkel')) {
            return view('livewire.admin.referensi.kelola-ruangan.kelas.murid.index', [
                'murids' => Murid::where('nama_murid', 'LIKE', $searchMurid)
                    ->where('kelas_id', $this->kelas_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'muridPage'),
                'kelas' => Kelas::all(),
                'gurus' => Guru::where('sekolah_id', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->get(),
                'pengajars' => GuruKelas::where('kelas_id', $this->kelas_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'guruPage'),
            ]);
        } else {
            $gurus = [];
            return view('livewire.admin.referensi.kelola-ruangan.kelas.murid.index', [
                'murids' => Murid::where('nama_murid', 'LIKE', $searchMurid)
                    ->where('kelas_id', $this->kelas_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'muridPage'),
                'kelas' => Kelas::all(),
                'gurus' => $gurus,
                'pengajars' => GuruKelas::where('kelas_id', $this->kelas_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'guruPage'),
            ]);
        }
    }

    private function resetInputFields()
    {
        $this->nama_murid = '';
        $this->guru_ids = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama_murid' => 'required',
        ]);

        Murid::create([
            'nama_murid' => $this->nama_murid,
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
        $murid = Murid::findOrFail($id);
        $this->murid_id = $id;
        $this->nama_murid = $murid->nama_murid;
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
            'nama_murid' => 'required',
        ]);

        $murid = Murid::find($this->murid_id);
        $murid->update([
            'nama_murid' => $this->nama_murid,
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
        $this->selectedMuridId = $id;

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
        $murid = Murid::find($this->selectedMuridId);

        if ($murid) {
            $murid->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Murid Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function store_guru()
    {
        $validatedDate = $this->validate([
            'guru_ids' => 'required|array|min:1',
        ]);

        foreach ($this->guru_ids as $guruId) {
            GuruKelas::create([
                'guru_id' => $guruId,
                'kelas_id' => $this->kelas_id,
            ]);
        }

        $this->resetInputFields();

        $this->alert('success', 'Berhasil Ditambahkan!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function delete_guru($id)
    {
        $guru = GuruKelas::find($id);

        if ($guru) {
            $guru->delete();
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
