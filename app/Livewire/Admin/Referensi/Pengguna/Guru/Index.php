<?php

namespace App\Livewire\Admin\Referensi\Pengguna\Guru;

use App\Models\Guru;
use App\Models\Sekolah;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_guru, $mata_pelajaran, $sekolah_guru, $guru_id, $searchGuru, $selectedGuruId;
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
        $this->gotoPage(1, 'guruPage');
    }
    public function render()
    {
        $searchGuru = '%' . $this->searchGuru . '%';
        if (auth()->user()->role == 'AdminSekolah') {
            return view('livewire.admin.referensi.pengguna.guru.index', [
                'gurus' => Guru::where('nama_guru', 'LIKE', $searchGuru)
                    ->where('sekolah_id', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'guruPage'),
            ]);
        } else {
            return view('livewire.admin.referensi.pengguna.guru.index', [
                'gurus' => Guru::where('nama_guru', 'LIKE', $searchGuru)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'guruPage'),
                'sekolahs' => Sekolah::all(),
            ]);
        }
    }

    private function resetInputFields()
    {
        $this->nama_guru = '';
        $this->mata_pelajaran= '';
        $this->sekolah_guru = '';
    }

    public function store()
    {
        if (auth()->user()->role == 'AdminSekolah') {
            $validatedDate = $this->validate([
                'nama_guru' => 'required',
                'mata_pelajaran' => 'required',
            ]);

            Guru::create([
                'nama_guru' => $this->nama_guru,
                'mata_pelajaran' => $this->mata_pelajaran,
                'sekolah_id' => auth()->user()->sekolah_id,
            ]);
        } else {
            $validatedDate = $this->validate([
                'nama_guru' => 'required',
                'mata_pelajaran' => 'required',
                'sekolah_guru' => 'required',
            ]);

            Guru::create([
                'nama_guru' => $this->nama_guru,
                'mata_pelajaran' => $this->mata_pelajaran,
                'sekolah_id' => $this->sekolah_guru,
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
        $guru = Guru::findOrFail($id);
        $this->guru_id = $id;
        $this->nama_guru = $guru->nama_guru;
        $this->mata_pelajaran = $guru->mata_pelajaran;
        $this->sekolah_guru = $guru->sekolah_id;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        if ($this->sekolah_guru) {
            $validatedDate = $this->validate([
                'nama_guru' => 'required',
                'mata_pelajaran' => 'required',
                'sekolah_guru' => 'required',
            ]);

            $guru = Guru::find($this->guru_id);
            $guru->update([
                'nama_guru' => $this->nama_guru,
                'mata_pelajaran' => $this->mata_pelajaran,
                'sekolah_id' => $this->sekolah_guru,
            ]);
        } else {
            $validatedDate = $this->validate([
                'nama_guru' => 'required',
                'mata_pelajaran' => 'required',
            ]);

            $guru = Guru::find($this->guru_id);
            $guru->update([
                'nama_guru' => $this->nama_guru,
                'mata_pelajaran' => $this->mata_pelajaran,
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
        $this->selectedGuruId = $id;

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
        $guru = Guru::find($this->selectedGuruId);

        if ($guru) {
            $guru->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Category Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}
