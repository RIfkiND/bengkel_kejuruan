@extends('layouts.admin')

@section('content')
    <div class="content-body">

        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Peralatan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Pemakaian</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
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
                                        <div class="row justify-content-md-center">
                                            <div class="col-lg-1 mb-4">
                                                <label for="tanggal" class="text-center">Tanggal Pakai</label>
                                            </div>
                                            <div class="col-lg-2 mb-4">
                                                <input type="date" id="tanggal" class="form-control input-default">

                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <input type="text" class="form-control input-default" name=""
                                                    id="waktu" placeholder="Waktu/Jam">
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <select class="form-control" id="ruangan">
                                                    <option value="" selected disabled>Ruangan</option>
                                                    <option value="">Ruangan 1</option>
                                                    <option value="">Ruangan 2</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <input type="text" id="kode" class="form-control input-default"
                                                    placeholder="Kode P/M">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 mb-4">
                                                <input type="text" class="form-control input-default"
                                                    placeholder="Nama Kelas">
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <input type="text" class="form-control input-default"
                                                    placeholder="Nama Guru">
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <input type="text" class="form-control input-default"
                                                    placeholder="Nama Murid">
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
                                <div class="col-2 d-flex justify-content-end px-4 h-50">
                                    <a href="add-pemeliharaan.html" type="button"
                                        class="btn mb-1 btn-primary d-flex justify-content-end">Tambahkan</a>
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- End Modal Info --}}

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
                                                    <h4><span class="badge badge-warning px-2 text-white">Belum</span></h4>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-v fa-lg"></i></a>
                                                        <div class="dropdown-menu"><a class="dropdown-item"
                                                                href="#"><i
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
        </div>
        <!-- #/ container -->
    </div>
@endsection
