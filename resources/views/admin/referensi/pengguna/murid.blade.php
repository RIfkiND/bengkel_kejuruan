@extends('layouts.admin')

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Murid</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Referensi</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Murid</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-end">
                    <button class="btn btn-rounded btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add-murid-modal">Tambah Murid</button>
                </div>
            </div>
        </div>
    </div>
    <!-- sample modal content -->
    <div id="add-murid-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambahkan Murid</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="name" aria-describedby="nameHelp">
                          <div id="nameHelp" class="form-text text-success">masukkan nama lengkap tanpa disingkat</div>
                        </div>
                        <div class="mb-3">
                          <label for="kelas" class="form-label">Kelas</label>
                          <input type="text" class="form-control" id="kelas" aria-describedby="kelasHelp">
                          <div id="kelasHelp" class="form-text">Contoh 12 A</div>
                        </div>

                      </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Tambahkan</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->



        <!-- multi-column ordering -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="tabel-murid" class="table border table-striped table-bordered text-nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Kode Murid</th>
                                        <th>Nama</th>

                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>STD-001</td>
                                        <td>John Doe</td>

                                        <td>12A</td>
                                    </tr>
                                    <tr>
                                        <td>STD-002</td>
                                        <td>Jane Smith</td>

                                        <td>11B</td>
                                    </tr>
                                    <!-- Tambahkan baris data lainnya sesuai kebutuhan -->
                                    <tr>
                                        <td>STD-003</td>
                                        <td>John Doe</td>

                                        <td>12A</td>
                                    </tr>
                                    <tr>
                                        <td>STD-004</td>
                                        <td>Jane Smith</td>

                                        <td>11B</td>
                                    </tr>
                                    <tr>
                                        <td>STD-005</td>
                                        <td>John Doe</td>

                                        <td>12A</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <x-footer />
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

@endsection
