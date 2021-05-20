<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}

    <!-- Custom fonts for this template-->
    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- SideNav -->
        @include('includes.sidenav ')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light d-md-none topbar static-top">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
                        <i class="fa fa-bars"></i>
                    </button>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="px-1 px-md-4 container-fluid ">
                    {{-- Content Here --}}
                    @include('includes.messages')


                    @yield('content')
                </div>
                <!-- End of Page Content -->

            </div>
            <!-- End of Main Content -->

            <!-- Begin Footer -->
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="my-auto text-center copyright">
                        <span>Copyright &copy; Webstatic Digital 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script src="{{ asset('js/app.js') }}" ></script>
    @yield('jscripts')
</body>
</html>

