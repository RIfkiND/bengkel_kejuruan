@extends('layouts.admin')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Peralatan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar</a></li>
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
