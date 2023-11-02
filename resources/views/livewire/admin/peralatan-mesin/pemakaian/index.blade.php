<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form wire:submit.prevent="store">
                            <div class="form-group">
                                <h4 class="text-center">Tambah Pemakaian</h4>
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
                                            <div class="col"><label>Waktu Pemakaian</label></div>
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
                            <div class="form-group">
                                <div class="row">
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
                                    <div class="col-lg-3 mb-4">
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
                        <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchCategory' wire:input='resetPage'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode P/M</th>
                                        <th>Kategori P/M</th>
                                        <th>Nama P/M</th>
                                        <th>Spesifikasi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-target="#infoModal" data-toggle="modal" style="cursor: pointer;">
                                            BRG-001</td>
                                        <td data-target="#infoModal" data-toggle="modal" style="cursor: pointer;">test
                                            cat</td>
                                        <td data-target="#infoModal" data-toggle="modal" style="cursor: pointer;">Kolor
                                        </td>
                                        <td>
                                            Merk: <i>SAMSUNG</i><br>
                                            Type/Model: <i>A01S</i><br>
                                            Tahun: <i>2018</i><br>
                                            Kapasitas: <i>50</i>
                                        </td>
                                        <td>
                                            <h4><span class="badge badge-success px-2 text-white">Selesai</span>
                                            </h4>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"><i
                                                        class="fa fa-ellipsis-v fa-lg"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Link 1</a>
                                                    <a class="dropdown-item" href="#">Link 2</a>
                                                    <a class="dropdown-item" href="#">Link 3</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-target="#infoModal" data-toggle="modal" style="cursor: pointer;">
                                        <td>BRG-001</td>
                                        <td>test cat</td>
                                        <td>Kolor</td>
                                        <td>
                                            Merk: <i>SAMSUNG</i><br>
                                            Type/Model: <i>A01S</i><br>
                                            Tahun: <i>2018</i><br>
                                            Kapasitas: <i>50</i>
                                        </td>
                                        <td>
                                            <h4><span class="badge badge-danger px-2 text-white">Belum</span></h4>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"><i
                                                        class="fa fa-ellipsis-v fa-lg"></i></a>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#"><i
                                                            class="fa fa-check text-success mr-2"></i>Selesai</a>
                                                    <a class="dropdown-item" href="#">Link 2</a> <a
                                                        class="dropdown-item" href="#">Link 3</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal info --}}

    <div class="modal fade" id="infoModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">More Info</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Tanggal Pemakaian :</b> DD-MM-YY</p>
                    <p><b>Waktu/Jam :</b> -</p>
                    <p><b>Dipakai oleh kelas :</b> XII-PPLG</p>
                    <p><b>Guru :</b> Drs Nurhayati S.pd</p>
                    <p><b>Murid :</b> Jajang</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- End Modal Info --}}
</div>
