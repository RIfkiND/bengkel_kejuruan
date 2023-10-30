<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form>
                            <div class="form-group">
                                <h4 class="text-center">Tambahkan Peralatan Atau Mesin</h4>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <input type="text" id="name" class="form-control input-default"
                                            placeholder="Nama Peralatan">
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Tambahkan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1 mb-4">
                                        <label for="tanggal" class="text-center">Tanggal Masuk</label>
                                    </div>
                                    <div class="col-lg-2 mb-4">
                                        <input type="date" id="tanggal" class="form-control input-default">
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <select class="form-control" id="category">
                                            <option>Cat 1</option>
                                            <option>Cat 2</option>
                                            <option>Cat 3</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <select class="form-control" id="ruangan">
                                            <option>Ruangan</option>
                                            <option>Cat 2</option>
                                            <option>Cat 3</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" id="name" class="form-control input-default"
                                            placeholder="Sumber Dana">
                                    </div>
                                </div>
                            </div>
                            <label>Spesifikasi</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 mb-4">
                                        <input type="text" id="spek" class="form-control input-default"
                                            placeholder="Merk">
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <input type="text" class="form-control input-default"
                                            placeholder="Type/Model">
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <input type="text" class="form-control input-default" placeholder="Tahun">
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <input type="text" class="form-control input-default"
                                            placeholder="Kapasitas">
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
                                <h4>Daftar Peralatan</h4>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchPeralatan' wire:input='resetPage'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Kategori P/M</th>
                                        <th>Nama Barang</th>
                                        <th>Spesifikasi</th>
                                        <th>Tanggal</th>
                                        <th>Waktu/Jam</th>
                                        <th>Nama Kelas</th>
                                        <th>Nama Guru</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BRG-001</td>
                                        <td>test cat</td>
                                        <td>Kolor</td>
                                        <td>
                                            Merk: <i>SAMSUNG</i><br>
                                            Type/Model: <i>A01S</i><br>
                                            Tahun: <i>2018</i><br>
                                            Kapasitas: <i>50</i>
                                        </td>
                                        <td>DD-MM-YY</td>
                                        <td>12.00-13.00</td>
                                        <td>XI-TKJ-A</td>
                                        <td>DR. Eni Nurhayati S.P.d</td>
                                        <td>
                                            <h3><span class="badge badge-success px-2">Selesai</span></h3>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"><i
                                                        class="fa fa-ellipsis-v fa-lg"></i></a>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Link
                                                        1</a> <a class="dropdown-item" href="#">Link 2</a> <a
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
</div>
