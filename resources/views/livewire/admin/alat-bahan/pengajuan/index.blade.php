<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title">
                                <h4>Daftar Pengajuan</h4>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchPengajuan' wire:input='resetPage'>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4 h-50">
                            <button type="button" class="btn mb-1 btn-primary d-flex justify-content-end"
                                data-toggle="modal" data-target="#ModalPengajuan">Ajukan Alat dan Bahan</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Gambar</th>
                                        <th>Kode A/B</th>
                                        <th>Nama A/B</th>
                                        <th>Spesifikasi</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>DD-MM-YY</td>
                                        <td><img onclick="previewImage(this)" src="/Asset/images/cc.jpg" alt=""
                                                style="max-width: 100px; height: auto; cursor: pointer;">
                                        </td>
                                        <td>BRG-001</td>
                                        <td>Masako</td>
                                        <td>
                                            Merk: <i>SAMSUNG</i><br>
                                            Type/Model: <i>A01S</i><br>
                                            Dimensi: <i>2018</i><br>
                                        </td>
                                        <td>Kilogram (Kg)</td>
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

    {{-- modal --}}
    @include('livewire.admin.alat-bahan.pengajuan.modal')
</div>

@push('js')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('close-modal', function() {
                $('#ModalPengajuan').modal('hide');
            });
        });
    </script>
@endpush
