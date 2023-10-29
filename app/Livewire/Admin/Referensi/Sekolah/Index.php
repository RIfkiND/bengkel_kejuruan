<?php

namespace App\Livewire\Admin\Referensi\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_sekolah, $sekolah_id, $searchSekolah, $selectedSekolahId;
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
        $this->gotoPage(1, 'sekolahPage');
    }
    public function render()
    {
        $searchSekolah = '%' . $this->searchSekolah . '%';

        return view('livewire.admin.referensi.sekolah.index', [
            'sekolah' => Sekolah::where('nama_sekolah', 'LIKE', $searchSekolah)
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'sekolahPage'),
        ]);
    }

    private function resetInputFields()
    {
        $this->nama_sekolah = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama_sekolah' => 'required',
        ]);

        Sekolah::create([
            'nama_sekolah' => $this->nama_sekolah,
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
        $sekolah = Sekolah::findOrFail($id);
        $this->sekolah_id = $id;
        $this->nama_sekolah = $sekolah->nama_sekolah;
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
            'nama_sekolah' => 'required',
        ]);

        $sekolah = Sekolah::find($this->sekolah_id);
        $sekolah->update([
            'nama_sekolah' => $this->nama_sekolah,
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
        $this->selectedSekolahId = $id;

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
        $sekolah = Sekolah::find($this->selectedSekolahId);

        if ($sekolah) {
            $sekolah->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Sekolah Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}