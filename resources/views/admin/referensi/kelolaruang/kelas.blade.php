@extends('layouts.admin')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Referensi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola Ruang</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Nama Sekolah</a></li>
                    </ol>
                </div>
            </div>
            @if ($sekolah != null)
                @livewire('admin.referensi.kelola-ruangan.kelas.index', ['sekolah_id' => $sekolah->id])
            @else
                @livewire('admin.referensi.kelola-ruangan.kelas.index')
            @endif
        </div>
        <!-- #/ container -->
    </div>
@endsection
