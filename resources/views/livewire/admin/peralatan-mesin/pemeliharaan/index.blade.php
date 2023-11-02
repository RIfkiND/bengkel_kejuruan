<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form wire:submit.prevent="store">
                            <div class="form-group">
                                <h4 class="text-center">Tambah Pemeliharaan</h4>
                            </div>

                            <div class="form-group">
                                <div class="row justify-content-md-center">
                                    <div class="col mb-4">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-1 mb-4">
                                        <label for="tanggal" class="text-center">Tanggal Mulai</label>
                                    </div>
                                    <div class="col-lg-2 mb-4">
                                        <input type="date" id="tanggal" class="form-control input-default"
                                            wire:model='tanggal'>
                                        @error('tanggal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <select class="form-control" id="ruangan" wire:model='ruangan_id'
                                            wire:change="updatePeralatans">
                                            <option value="" selected>Ruangan</option>
                                            @foreach ($ruangans as $ruangan)
                                                <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <select class="form-control" id="peralatan" wire:model='p_m_id'>
                                            <option value="" selected>Peralatan/Mesin</option>
                                            @foreach ($peralatans as $peralatan)
                                                <option value="{{ $peralatan->id }}">
                                                    {{ $peralatan->nama_peralatan_atau_mesin }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('p_m_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-4 mb-4">
                                        <select class="form-control" id="ruangan" wire:model='jenis'>
                                            <option value="" selected>Jenis Kerusakan</option>
                                            <option value="Perawatan Rutin">Perawatan Rutin</option>
                                            <option value="Perbaikan">Perbaikan</option>
                                        </select>
                                        @error('jenis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <textarea class="form-control" id="keterangan" rows="2" placeholder="Keterangan" wire:model='keterangan'></textarea>
                                        @error('keterangan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
                                <h4>Daftar Pemeliharaan</h4>
                            </div>
                        </div>
                        {{-- <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchRuangan' wire:input='resetPage'>
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
                                        <th>Jenis Kerusakan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemeliharaans as $pemeliharaan)
                                        <tr>
                                            <td data-target="#infoModal" data-toggle="modal" style="cursor: pointer;">
                                                PM-{{ $pemeliharaan->peralatan_id }}</td>
                                            <td data-target="#infoModal" data-toggle="modal" style="cursor: pointer;">
                                                {{ $pemeliharaan->peralatan->nama_peralatan_atau_mesin }}</td>
                                            <td data-target="#infoModal" data-toggle="modal" style="cursor: pointer;">
                                                {{ $pemeliharaan->jenis }}</td>
                                            <td>
                                                <h4>
                                                    <span
                                                        class="badge {{ $pemeliharaan->status == 'Selesai' ? 'badge-success' : 'badge-danger' }} px-2 text-white">{{ $pemeliharaan->status }}</span>
                                                </h4>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v fa-lg"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-toggle="modal" data-target="#infoModal">More info</a>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click='updateStatus({{ $pemeliharaan->id }})'>
                                                            @if ($pemeliharaan->status == 'Belum Selesai')
                                                                Selesai
                                                            @else
                                                                Belum Selesai
                                                            @endif
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Link 3</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">More Info</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Tanggal Pemeliharaan :</b> DD-MM-YY</p>
                    <p><b>Jenis kerusakan :</b> Perawatan Rutin</p>
                    <p><b>Keterangan :</b> Ganti oli</p>
                    @foreach ($ruangans as $ruangan)
                        <p><b>Ruangan :</b> {{ $ruangan->nama_ruangan }}</p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
