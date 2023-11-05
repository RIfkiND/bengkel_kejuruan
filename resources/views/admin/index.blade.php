@extends('layouts.admin')

@push('css')
    <!-- Pignose Calender -->
    <link href="/Asset/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/Asset/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/Asset/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
@endpush

@section('content')
    <div class="content-body">

        @livewire('admin.index')
        <!-- #/ container -->
    </div>
@endsection

@push('js')
    <!-- Chartjs -->
    <script src="/Asset/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Datamap -->
    <script src="/Asset/plugins/d3v3/index.js"></script>
    <script src="/Asset/plugins/topojson/topojson.min.js"></script>
    <script src="/Asset/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="/Asset/plugins/raphael/raphael.min.js"></script>
    <script src="/Asset/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="/Asset/plugins/moment/moment.min.js"></script>
    <script src="/Asset/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="/Asset/plugins/chartist/js/chartist.min.js"></script>
    <script src="/Asset/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="/Asset/js/dashboard/dashboard-1.js"></script>
@endpush
