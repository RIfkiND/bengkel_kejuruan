<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">

    <title>Manajemen Bengkel</title>

    <!-- Custom CSS -->
    <link href="/Asset/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Asset/css/loginregister.css') }}">
</head>

<body class="h-100">
    <!--*******************
        Preloader start
    ********************-->
    <x-preloader />
    <!--*******************
        Preloader end
    ********************-->
    <div class="">

        @yield('content')

    </div>



    <script src="/Asset/libs/jquery/dist/jquery.min.js"></script>
    <script src="/Asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="/Asset/js/app-style-switcher.js"></script>
    <script src="/Asset/js/feather.min.js"></script>
    <script src="/Asset/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/Asset/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/Asset/js/custom.min.js"></script>
</body>

</html>
