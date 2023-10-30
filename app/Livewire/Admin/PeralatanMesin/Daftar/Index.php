<?php

namespace App\Livewire\Admin\PeralatanMesin\Daftar;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PeralatanAtauMesin;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_peralatan_atau_mesin, $peralatan_id, $searchPeralatan, $selectedPeralatanId;
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
        $this->gotoPage(1, 'peralatanPage');
    }
    public function render()
    {
        $searchPeralatan = '%' . $this->searchPeralatan . '%';

        return view('livewire.admin.peralatan-mesin.daftar.index', [
            'peralatans' => PeralatanAtauMesin::where('nama_peralatan_atau_mesin', 'LIKE', $searchPeralatan)
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'peralatanPage'),
        ]);
    }

    private function resetInputFields()
    {
        $this->nama_peralatan_atau_mesin = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama_peralatan_atau_mesin' => 'required',
        ]);

        PeralatanAtauMesin::create([
            'nama_peralatan_atau_mesin' => $this->nama_peralatan_atau_mesin,
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
