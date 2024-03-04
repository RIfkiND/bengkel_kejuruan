@extends('layouts.admin')

@push('css')
    <!-- Pignose Calender -->
    <link href="/Asset/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/Asset/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/Asset/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="page-wrapper">

        @livewire('admin.index')
        <!-- #/ container -->
    </div>
@endsection

@push('js')
    <!--This page JavaScript -->
    <script src="/Asset/extra-libs/c3/d3.min.js"></script>
    <script src="/Asset/extra-libs/c3/c3.min.js"></script>
    <script src="/Asset/libs/chartist/dist/chartist.min.js"></script>
    <script src="/Asset/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/Asset/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/Asset/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/Asset/js/pages/dashboards/dashboard1.min.js"></script>
@endpush
