<?php

namespace App\Livewire\Admin;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Ruangan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AlatAtauBahan;
use App\Models\PeralatanAtauMesin;
use App\Models\PengajuanAlatAtauBahan;
use App\Models\PemeliharaanDanPerawatan;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $nama_alat_atau_bahan, $nama_pengaju, $tanggal, $kode, $volume, $satuan, $sumber_dana, $merk, $type, $dimensi, $image, $pengajuan_id, $searchPengajuan, $selectedPengajuanId, $imageprev;
    public $updateMode = false;
    public $informasiMode = false;
    public function render()
    {
        $searchPengajuan = '%' . $this->searchPengajuan . '%';
        if (auth()->user()->role == 'AdminSekolah') {
            return view('livewire.admin.index', [
                'pengajuans' => PengajuanAlatAtauBahan::where('nama_alat_atau_bahan', 'LIKE', $searchPengajuan)
                    ->where('sekolah_id', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'pengajuanPages'),
                'akuns' => User::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                'gurus' => Guru::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                'kelas' => Kelas::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                'ruangans' => Ruangan::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                'peralatans' => PeralatanAtauMesin::whereHas('ruangan', function ($query) {
                    $query->where('sekolah_id', auth()->user()->sekolah->id);
                }),
                'alats' => AlatAtauBahan::whereHas('ruangan', function ($query) {
                    $query->where('sekolah_id', auth()->user()->sekolah->id);
                }),
                'pemeliharaans' => PemeliharaanDanPerawatan::whereHas('peralatan', function ($query) {
                    $query->whereHas('ruangan', function ($query) {
                        $query->where('sekolah_id', auth()->user()->sekolah->id);
                    });
                }),
            ]);
        } elseif (auth()->user()->role == 'KepalaBengkel') {
            return view('livewire.admin.index', [
                'peralatans' => PeralatanAtauMesin::where('ruangan_id', auth()->user()->ruangan_id)->get(),
                'alats' => AlatAtauBahan::where('ruangan_id', auth()->user()->ruangan_id)->get(),
                'pemeliharaans' => PemeliharaanDanPerawatan::whereHas('peralatan', function ($query) {
                    $query->where('ruangan_id', auth()->user()->ruangan_id);
                }),
            ]);
        } elseif (auth()->user()->role == 'Guru') {
            return view('livewire.admin.index', [
                'kelas' => Kelas::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                'ruangans' => Ruangan::where('sekolah_id', auth()->user()->sekolah_id)->get(),
            ]);
        } else {
            return view('livewire.admin.index', [
                'akuns' => User::all(),
                'gurus' => Guru::all(),
                'kelas' => Kelas::all(),
                'ruangans' => Ruangan::all(),
                'peralatans' => PeralatanAtauMesin::all(),
                'alats' => AlatAtauBahan::all(),
                'pemeliharaans' => PemeliharaanDanPerawatan::all(),
            ]);
        }
    }

    public function info($id)
    {
        $this->selectedPengajuanId = $id;
        $pengajuan = PengajuanAlatAtauBahan::findOrFail($id);
        $this->pengajuan_id = $id;
        $this->nama_alat_atau_bahan = $pengajuan->nama_alat_atau_bahan;
        $this->imageprev = $pengajuan->gambar;
        $this->type = $pengajuan->type_atau_model;
        $this->dimensi = $pengajuan->dimensi;
        $this->merk = $pengajuan->merk;
        $this->kode = $pengajuan->kode;
        $this->volume = $pengajuan->volume;
        $this->satuan = $pengajuan->satuan;
        $this->nama_pengaju = $pengajuan->guru->nama_guru;
        $this->informasiMode = true;
    }

    public function updateStatus($newStatus)
    {
        $pengajuan = PengajuanAlatAtauBahan::find($this->selectedPengajuanId);

        if (in_array($newStatus, ['Diterima', 'Ditolak'])) {
            $pengajuan->status = $newStatus;
            $pengajuan->save();
            $this->alert('success', 'Berhasil ' . $newStatus . ' !', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function cancel()
    {
        $this->informasiMode = false;
    }
}
