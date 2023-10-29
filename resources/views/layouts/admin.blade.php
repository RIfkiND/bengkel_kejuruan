<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/Asset/assets/images/favicon.png">
    <title>Freedash Template - The Ultimate Multipurpose admin template</title>

    @livewireStyles

    <!-- Custom CSS -->
    <link href="/Asset/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/Asset/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/Asset/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="/Asset/dist/css/style.min.css" rel="stylesheet">

    @stack('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <x-preloader />
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <x-topbar />
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <x-sidebar />
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    @stack('js')

    <script src="/Asset/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/Asset/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="/Asset/dist/js/app-style-switcher.js"></script>
    <script src="/Asset/dist/js/feather.min.js"></script>
    <script src="/Asset/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/Asset/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/Asset/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="/Asset/assets/extra-libs/c3/d3.min.js"></script>
    <script src="/Asset/assets/extra-libs/c3/c3.min.js"></script>
    <script src="/Asset/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="/Asset/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/Asset/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/Asset/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/Asset/dist/js/pages/dashboards/dashboard1.min.js"></script>

    @livewireScripts
</body>

</html>
