@extends('layouts.admin')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Referensi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola Ruang</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Nama Sekolah</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Nama kelas</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- row -->
        @livewire('admin.referensi.kelola-ruangan.kelas.murid.index', ['kelas_id' => $kelas->id])
    </div>
@endsection
