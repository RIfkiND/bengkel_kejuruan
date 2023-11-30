<?php

namespace App\Livewire\Admin\Referensi\KategoriPeralatan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KategoriPeralatanAtauMesin;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama_kategori, $kategori_id, $searchKategori, $selectedKategoriId;
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
        $this->gotoPage(1, 'kategoriPage');
    }
    public function render()
    {
        $searchKategori = '%' . $this->searchKategori . '%';

        return view('livewire.admin.referensi.kategori-peralatan.index', [
            'kategories' => KategoriPeralatanAtauMesin::where('nama_kategori', 'LIKE', $searchKategori)
                ->where('sekolah_id', auth()->user()->sekolah_id)
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'kategoriPage'),
        ]);
    }

    private function resetInputFields()
    {
        $this->nama_kategori = '';
    }

    public function store()
    {
        $validatedDate = $this->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'nama_kategori.required' => 'Nama tidak boleh kosong',
            ],
        );

        KategoriPeralatanAtauMesin::create([
            'nama_kategori' => $this->nama_kategori,
            'sekolah_id' => auth()->user()->sekolah_id,
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
        $kategori = KategoriPeralatanAtauMesin::findOrFail($id);
        $this->kategori_id = $id;
        $this->nama_kategori = $kategori->nama_kategori;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'nama_kategori.required' => 'Nama tidak boleh kosong',
            ],
        );

        $kategori = KategoriPeralatanAtauMesin::find($this->kategori_id);
        $kategori->update([
            'nama_kategori' => $this->nama_kategori,
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
        $this->selectedKategoriId = $id;

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
        $kategori = KategoriPeralatanAtauMesin::find($this->selectedKategoriId);

        if ($kategori) {
            $kategori->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Kategori Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}
