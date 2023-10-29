<?php

namespace App\Livewire\Admin\Referensi\KelolaRuangan\Ruangan;

use App\Models\Ruangan;
use App\Models\Sekolah;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_ruangan, $sekolah_id, $letak_ruangan, $ruangan_id, $searchRuangan, $selectedRuanganId;
    public $updateMode = false;

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
        $this->gotoPage(1, 'ruanganPage');
    }
    public function render()
    {
        $searchRuangan = '%' . $this->searchRuangan . '%';

        if (auth()->user()->role == 'AdminSekolah') {
            return view('livewire.admin.referensi.kelola-ruangan.ruangan.index', [
                'ruangans' => Ruangan::where('nama_ruangan', 'LIKE', $searchRuangan)
                    ->where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'ruanganPage'),
            ]);
        } elseif (auth()->user()->role == 'Guru') {
            return view('livewire.admin.referensi.kelola-ruangan.ruangan.index', [
                'ruangans' => Ruangan::where('nama_ruangan', 'LIKE', $searchRuangan)
                    ->where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'ruanganPage'),
            ]);
        } else {
            return view('livewire.admin.referensi.kelola-ruangan.ruangan.index', [
                'ruangans' => Ruangan::where('nama_ruangan', 'LIKE', $searchRuangan)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'ruanganPage'),
                'sekolahs' => Sekolah::All(),
            ]);
        }
    }

    private function resetInputFields()
    {
        $this->nama_ruangan = '';
        $this->letak_ruangan = '';
        $this->sekolah_id = '';
    }

    public function store()
    {
        if (auth()->user()->sekolah_id) {
            $validatedDate = $this->validate([
                'nama_ruangan' => 'required',
                'letak_ruangan' => 'required',
            ]);

            Ruangan::create([
                'nama_ruangan' => $this->nama_ruangan,
                'sekolah_id' => auth()->user()->sekolah_id,
                'letak_ruangan' => $this->letak_ruangan,
            ]);
        } else {
            $validatedDate = $this->validate([
                'nama_ruangan' => 'required',
                'sekolah_id' => 'required',
                'letak_ruangan' => 'required',
            ]);

            Ruangan::create([
                'nama_ruangan' => $this->nama_ruangan,
                'sekolah_id' => $this->sekolah_id,
                'letak_ruangan' => $this->letak_ruangan,
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

    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $this->ruangan_id = $id;
        $this->nama_ruangan = $ruangan->nama_ruangan;
        $this->letak_ruangan = $ruangan->letak_ruangan;
        $this->sekolah_id = $ruangan->sekolah_id;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        if ($this->sekolah_id) {
            $validatedDate = $this->validate([
                'nama_ruangan' => 'required',
                'sekolah_id' => 'required',
                'letak_ruangan' => 'required',
            ]);

            $ruangan = Ruangan::find($this->kelas_id);
            $ruangan->update([
                'nama_ruangan' => $this->nama_ruangan,
                'sekolah_id' => $this->sekolah_id,
                'letak_ruangan' => $this->letak_ruangan,
            ]);
        } else {
            $validatedDate = $this->validate([
                'nama_ruangan' => 'required',
                'letak_ruangan' => 'required',
            ]);

            $ruangan = Ruangan::find($this->kelas_id);
            $ruangan->update([
                'nama_ruangan' => $this->nama_ruangan,
                'sekolah_id' => auth()->user()->sekolah_id,
                'letak_ruangan' => $this->letak_ruangan,
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

    public function ondel($id)
    {
        $this->selectedRuanganId = $id;

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
        $ruangan = Ruangan::find($this->selectedRuanganId);

        if ($ruangan) {
            $ruangan->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Ruangan Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}
