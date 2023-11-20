<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        @if ($updateMode)
                            <form wire:submit.prevent="update">
                                <div class="form-group">
                                    <h4 class="text-center">Edit Data Peminjaman</h4>
                                </div>
                            @else
                                <form wire:submit.prevent="store">
                                    <div class="form-group">
                                        <h4 class="text-center">Tambah Peminjaman</h4>
                                    </div>
                        @endif
                        <div class="form-group">
                            <div class="row justify-content-md-center">
                                <div class="col mb-4">
                                    <div class="d-flex justify-content-end">
                                        @if ($updateMode)
                                            <button type="button" class="btn btn-danger"
                                                wire:click='cancel'>Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        @else
                                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-md-center text-center">
                                <div class="col-lg-4 mb-4">
                                    <div class="row">
                                        <div class="col">
                                            <label for="tanggal" class="text-center">Tanggal Pakai</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="date" id="tanggal" wire:model='tanggal'
                                                class="form-control input-default">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="row">
                                        <div class="col"><label>Waktu Peminjaman</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input id="start" class="form-control input-default" type="time"
                                                placeholder="Dari..." wire:model='waktu_awal' />
                                        </div>
                                        <div class="col">
                                            <input id="end" class="form-control input-default" type="time"
                                                placeholder="Sampai..." wire:model='waktu_akhir' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($updateMode == false)
                            <div class="form-group">
                                <div class="row">
                                    @if (auth()->user()->role != 'KepalaBengkel')
                                        <div class="col-lg-3 mb-4">
                                            <select class="form-control" id="ruangan" wire:model='ruangan_id'
                                                wire:change='updatePeralatans'>
                                                <option value="" selected>Ruangan</option>
                                                @foreach ($ruangans as $ruangan)
                                                    <option value="{{ $ruangan->id }}">
                                                        {{ $ruangan->nama_ruangan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="col-lg-3 mb-4">
                                        <select multiple="multiple" class="form-control" id="peralatan" wire:model='p_m_id'>
                                            <option value="" selected>Peralatan/Mesin</option>
                                            @foreach ($peralatans as $peralatan)
                                                @php
                                                    $validPeralatan = true;
                                                    foreach ($peralatan->pemeliharaan as $pemeliharaan) {
                                                        if ($pemeliharaan->status == 'Belum Selesai') {
                                                            $validPeralatan = false;
                                                            break;
                                                        }
                                                    }
                                                @endphp

                                                @if ($validPeralatan)
                                                    <option value="{{ $peralatan->id }}">
                                                        {{ $peralatan->nama_peralatan_atau_mesin }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('p_m_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (auth()->user()->role != 'Guru')
                                        <div class="col-lg-3 mb-4">
                                            <select class="form-control" id="guru" wire:model='guru_id'
                                                wire:change='updateKelas'>
                                                <option value="" selected>Guru</option>
                                                @foreach ($gurus as $guru)
                                                    <option value="{{ $guru->id }}">
                                                        {{ $guru->nama_guru }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="col-lg-3 mb-4">
                                        <select class="form-control" id="ruangan" wire:model='kelas_id'>
                                            <option value="" selected>Kelas</option>
                                            @foreach ($kelas as $kls)
                                                <option value="{{ $kls->kelas->id }}">
                                                    {{ $kls->kelas->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title">
                                <h4>Daftar Pemakaian</h4>
                            </div>
                        </div>
                        {{-- <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchCategory' wire:input='resetPage'>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode P/M</th>
                                        <th>Nama P/M</th>
                                        <th>Tanggal Pemakaian</th>
                                        <th>Waktu</th>
                                        <th>Pemakai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjamans as $peminjaman)
                                        <tr>
                                            <td data-target="#infoModal" data-toggle="modal" style="cursor: pointer;" wire:click='info({{ $peminjaman->id }})'>
                                                PM-{{ $peminjaman->peralatan_atau_mesin_id }}</td>
                                            <td data-target="#infoModal" data-toggle="modal"
                                                style="cursor: pointer;">
                                                {{ $peminjaman->peralatan->nama_peralatan_atau_mesin }}</td>
                                            <td data-target="#infoModal" data-toggle="modal"
                                                style="cursor: pointer;">
                                                {{ $peminjaman->tanggal_pemakaian }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($peminjaman->waktu_awal)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($peminjaman->waktu_akhir)->format('H:i') }}
                                            </td>
                                            <td>
                                                <span>Guru:</span> <small>{{ $peminjaman->guru->nama_guru }}</small>
                                                <br>
                                                <span>Kelas:</span> <small>{{ $peminjaman->kelas->nama_kelas }}</small>
                                            </td>
                                            <td>
                                                <h4><span
                                                        class="badge {{ $peminjaman->status_pengajuan == 'Pending' ? 'badge-secondary' : ($peminjaman->status_pengajuan == 'Disetujui' ? 'badge-success' : 'badge-danger') }}
                                                    px-2 text-white">{{ $peminjaman->status_pengajuan }}</span>
                                                </h4>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v fa-lg"></i></a>
                                                    <div class="dropdown-menu">
                                                        @if (auth()->user()->role == 'KepalaBengkel' || auth()->user()->role == 'Guru')
                                                            @if (auth()->user()->role == 'KepalaBengkel')
                                                                <div class="dropdown-item text-dark">
                                                                    <a href="javascript:void(0)"
                                                                        wire:click='updateStatus_pengajuan({{ $peminjaman->id }}, "Disetujui")'>Setujui</a>
                                                                    |
                                                                    <a href="javascript:void(0)"
                                                                        wire:click='updateStatus_pengajuan({{ $peminjaman->id }}, "Ditolak")'>Tolak</a>
                                                                </div>
                                                            @endif
                                                            <a href="javascript:void(0)" class="dropdown-item"
                                                                wire:click='statuspemakaian({{ $peminjaman->id }})'>Selesai
                                                                Dipakai</a>
                                                        @endif
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click='edit({{ $peminjaman->id }})'>Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click='ondel({{ $peminjaman->id }})'>Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $peminjamans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal info --}}

    <div wire:ignore.self class="modal fade" id="infoModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">More Info</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($informasiMode)
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="card-text">
                                    <span>Merk : {{ $merk}}</span><br><br>
                                    <Span>Type/Model : {{ $type }}</Span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-text">
                                    <span>Tahun : {{ $tahun }}</span><br><br>
                                    <span>Kapasitas : {{ $kapasitas }} <br><br></span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- End Modal Info --}}
</div>
