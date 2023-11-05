<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>Manajement Bengkel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/Asset/images/logo-dashboard.png">
    @livewireStyles
    @stack('css')
    <!-- Custom Stylesheet -->
    <link href="/Asset/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <x-preloader />
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <x-navheader />
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <x-header />
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <x-sidebar />
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <x-footer />
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/Asset/plugins/common/common.min.js"></script>
    <script src="/Asset/js/custom.min.js"></script>
    <script src="/Asset/js/settings.js"></script>
    <script src="/Asset/js/gleek.js"></script>
    <script src="/Asset/js/styleSwitcher.js"></script>

    {{-- Mobiscroll Daterange --}}


    <!-- Circle progress -->
    <script src="/Asset/plugins/circle-progress/circle-progress.min.js"></script>

    @stack('js')

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
</body>

</html>
