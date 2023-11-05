<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Manajement Bengkel</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/Asset/images/logo-dashboard.png">

    <link href="/Asset/css/style.css" rel="stylesheet">
</head>

<body class="h-100">
    <!--*******************
        Preloader start
    ********************-->
    <x-preloader />
    <!--*******************
        Preloader end
    ********************-->

    @yield('content')


    <script src="/Asset/plugins/common/common.min.js"></script>
    <script src="/Asset/js/custom.min.js"></script>
    <script src="/Asset/js/settings.js"></script>
    <script src="/Asset/js/gleek.js"></script>
    <script src="/Asset/js/styleSwitcher.js"></script>
</body>

</html>
