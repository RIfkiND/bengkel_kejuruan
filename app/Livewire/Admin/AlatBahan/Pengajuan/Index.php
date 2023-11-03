<?php

namespace App\Livewire\Admin\AlatBahan\Pengajuan;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\PengajuanAlatAtauBahan;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $nama, $image, $category_id, $searchCategory, $selectedCategoryId, $imageprev;
    public $updateMode = false;

    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public function getListeners()
    {
        return ['delete'];
    }

    public function resetPage()
    {
        $this->gotoPage(1, 'categoryPages');
    }
    public function render()
    {
        $searchCategory = '%' . $this->searchCategory . '%';
        return view('livewire.admin.alat-bahan.pengajuan.index', [
            'categories' => PengajuanAlatAtauBahan::where('nama_alat_atau_bahan', 'LIKE', $searchCategory)
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'categoryPages'),
        ]);
    }

    private function resetInputFields()
    {
        $this->nama = '';
        $this->image = null;
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama' => 'required',
        ]);

        $validatedDate['image'] = $this->image->store('files', 'public');

        PengajuanAlatAtauBahan::create([
            'nama' => $this->nama,
            'image' => $validatedDate['image'],
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
        $category = PengajuanAlatAtauBahan::findOrFail($id);
        $this->category_id = $id;
        $this->nama = $category->nama;
        $this->imageprev = $category->image;
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
            'nama' => 'required',
        ]);

        if ($this->image != null) {
            $validatedDate['image'] = $this->image->store('files', 'public');
            $category = PengajuanAlatAtauBahan::find($this->category_id);
            $category->update([
                'nama' => $this->nama,

                'image' => $validatedDate['image'],
            ]);
            Storage::disk('public')->delete($this->imageprev);
        } else {
            $category = PengajuanAlatAtauBahan::find($this->category_id);
            $category->update([
                'nama' => $this->nama,
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

    // public function updateStatus($id)
    // {
    //     $category = PengajuanAlatAtauBahan::find($id);
    //     $category->status = $category->status == 1 ? 0 : 1;
    //     $category->save();
    // }

    public function ondel($id)
    {
        $this->selectedCategoryId = $id;

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
        $category = PengajuanAlatAtauBahan::find($this->selectedCategoryId);

        if ($category) {
            Storage::disk('public')->delete($category->image);
            $category->delete();
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
