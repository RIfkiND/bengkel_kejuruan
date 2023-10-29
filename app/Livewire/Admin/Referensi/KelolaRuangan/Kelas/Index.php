<?php

namespace App\Livewire\Admin\Referensi\KelolaRuangan\Kelas;

use App\Models\Kelas;
use App\Models\Sekolah;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_kelas, $sekolah_id, $tingkat, $jurusan, $kelas_id, $searchKelas, $selectedKelasId;
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
        $this->gotoPage(1, 'kelasPage');
    }
    public function render()
    {
        $searchKelas = '%' . $this->searchKelas . '%';

        if (auth()->user()->role == 'AdminSekolah') {
            return view('livewire.admin.referensi.kelola-ruangan.kelas.index', [
                'kelas' => Kelas::where('nama_kelas', 'LIKE', $searchKelas)
                    ->where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'kelasPage'),
            ]);
        } elseif (auth()->user()->role == 'Guru') {
            return view('livewire.admin.referensi.kelola-ruangan.kelas.index', [
                'kelas' => Kelas::where('nama_kelas', 'LIKE', $searchKelas)
                    ->where('sekolah_id', 'LIKE', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'kelasPage'),
            ]);
        } else {
            return view('livewire.admin.referensi.kelola-ruangan.kelas.index', [
                'kelas' => Kelas::where('nama_kelas', 'LIKE', $searchKelas)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'kelasPage'),
                'sekolahs' => Sekolah::All(),
            ]);
        }
    }

    private function resetInputFields()
    {
        $this->nama_kelas = '';
        $this->sekolah_id = '';
        $this->tingkat = '';
        $this->jurusan = '';
    }

    public function store()
    {
        if (auth()->user()->sekolah_id) {
            $validatedDate = $this->validate([
                'nama_kelas' => 'required',
                'tingkat' => 'required',
                'jurusan' => 'required',
            ]);

            Kelas::create([
                'nama_kelas' => $this->nama_kelas,
                'sekolah_id' => auth()->user()->sekolah_id,
                'tingkat' => $this->tingkat,
                'jurusan' => $this->jurusan,
            ]);
        } else {
            $validatedDate = $this->validate([
                'nama_kelas' => 'required',
                'sekolah_id' => 'required',
                'tingkat' => 'required',
                'jurusan' => 'required',
            ]);

            Kelas::create([
                'nama_kelas' => $this->nama_kelas,
                'sekolah_id' => $this->sekolah_id,
                'tingkat' => $this->tingkat,
                'jurusan' => $this->jurusan,
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
        $kelas = Kelas::findOrFail($id);
        $this->kelas_id = $id;
        $this->nama_kelas = $kelas->nama_kelas;
        $this->sekolah_id = $kelas->sekolah_id;
        $this->tingkat = $kelas->tingkat;
        $this->jurusan = $kelas->jurusan;
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
                'nama_kelas' => 'required',
                'sekolah_id' => 'required',
                'tingkat' => 'required',
                'jurusan' => 'required',
            ]);

            $kelas = Kelas::find($this->kelas_id);
            $kelas->update([
                'nama_kelas' => $this->nama_kelas,
                'sekolah_id' => $this->sekolah_id,
                'tingkat' => $this->tingkat,
                'jurusan' => $this->jurusan,
            ]);
        } else {
            $validatedDate = $this->validate([
                'nama_kelas' => 'required',
                'tingkat' => 'required',
                'jurusan' => 'required',
            ]);

            $kelas = Kelas::find($this->kelas_id);
            $kelas->update([
                'nama_kelas' => $this->nama_kelas,
                'sekolah_id' => auth()->user()->sekolah_id,
                'tingkat' => $this->tingkat,
                'jurusan' => $this->jurusan,
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
        $this->selectedKelasId = $id;

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
        $kelas = Kelas::find($this->selectedKelasId);

        if ($kelas) {
            $kelas->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Kelas Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}
