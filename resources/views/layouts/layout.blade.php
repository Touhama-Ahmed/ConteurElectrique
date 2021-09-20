<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">



    <!-- sweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css" integrity="sha256-tZS42DPuYTXIRzSSTJS9gwKPv8+pglbBfNtJUNvdyW4=" crossorigin="anonymous">
    <!-- Title -->
    <title>SMARTILAB</title>

    <!-- Css -->
    @yield('css')


</head>
<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        @include('includes.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- topbar -->
                @include('includes.topbar')

                @yield('Content')

                <!-- footer -->
                @include('includes.footer')
            </div>

        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<!-- Bootstrap core JavaScript-->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js" integrity="sha256-dOvlmZEDY4iFbZBwD8WWLNMbYhevyx6lzTpfVdo0asA=" crossorigin="anonymous"></script>

 <!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/chart-area-demo.js"></script>
<script src="/js/demo/chart-pie-demo.js"></script>
<!-- JsFooter -->
@yield('JsFooter')
    @include('includes.sweetalert-response')
</body>
</html>
