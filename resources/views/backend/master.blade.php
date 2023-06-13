<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Admin :: Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/charts-c3/plugin.css" />

    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/morrisjs/morris.min.css" />

    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/select2/select2.css" />
    {{-- select2 --}}

    {{-- dropify --}}
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/dropify/css/dropify.min.css">
    {{-- dropify --}}

    {{-- calendar --}}
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/bootstrap-select/css/bootstrap-select.css" />
    {{-- calendar --}}

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <!-- JQuery DataTable Css -->

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/css/style.min.css">
    @yield('css')
</head>

<body class="theme-blush">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('adminAssets') }}/images/loader.svg"
                    width="48" height="48" alt="Aero"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Main Search -->
    <div id="search">
        <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
        <form>
            <input type="search" value="" placeholder="Search..." />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Right Icon menu Sidebar -->
    @include('backend.include.right-sidebar')

    <!-- Left Sidebar -->
    @include('backend.include.left-sidebar')

    <!-- Right Sidebar -->
    {{-- that part move to right-sidebar  --}}

    <!-- Main Content -->

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> HRM</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>


    <!-- Jquery Core Js -->
    <script src="{{ asset('adminAssets') }}/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{ asset('adminAssets') }}/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="{{ asset('adminAssets') }}/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{ asset('adminAssets') }}/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="{{ asset('adminAssets') }}/bundles/c3.bundle.js"></script>

    <script src="{{ asset('adminAssets') }}/bundles/mainscripts.bundle.js"></script>
    <script src="{{ asset('adminAssets') }}/js/pages/index.js"></script>
    <script src="{{ asset('adminAssets') }}/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->
    <script src="{{ asset('adminAssets') }}/js/pages/forms/advanced-form-elements.js"></script>

    {{-- dropify --}}
    <script src="{{ asset('adminAssets') }}/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{ asset('adminAssets') }}/js/pages/forms/dropify.js"></script>
    {{-- dropify --}}

    {{-- calendar --}}
    <script src="{{ asset('adminAssets') }}/bundles/fullcalendarscripts.bundle.js"></script>
    {{-- calendar --}}

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('adminAssets') }}/bundles/datatablescripts.bundle.js"></script>
    <script src="{{ asset('adminAssets') }}/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{ asset('adminAssets') }}/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('adminAssets') }}/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{ asset('adminAssets') }}/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{ asset('adminAssets') }}/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{ asset('adminAssets') }}/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('adminAssets') }}/js/pages/tables/jquery-datatable.js"></script>

    {{-- custom_js --}}
    <script src="{{ asset('adminAssets') }}/js/custom.js"></script>
    {{-- custom_js --}}
    @yield('script')
</body>

</html>
