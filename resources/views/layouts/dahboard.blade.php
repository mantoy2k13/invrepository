<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Martin School Travel - @yield('title')">
    <meta name="author" content="Denver Web Development">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <link rel="icon" type="image/png" href="{{ asset('back-office/images/favicon-32x32.png') }}" sizes="32x32" />

    <title>@yield('title') | Martin School Travel</title>

    <!-- DataTables -->
    <link href="{{ asset('back-office/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/plugins/summernote/dist/summernote.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-office/plugins/sweetalert/sweetalert.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-office/plugins/parsleyjs/src/parsley.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-office/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/plugins/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back-office/plugins/intltelInput/css/intlTelInput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back-office/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('back-office/js/modernizr.min.js') }}"></script>
    @yield('styles')
</head>
<body class="fixed-left">
    <div class="no-printme" id="wrapper">
        @include('dashboard.partials.topbar')
        @include('dashboard.partials.sidebar')
        @yield('content')
    </div>

    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
    <script src="{{ asset('back-office/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back-office/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back-office/js/detect.js') }}"></script>
    <script src="{{ asset('back-office/js/fastclick.js') }}"></script>
    <script src="{{ asset('back-office/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('back-office/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('back-office/js/waves.js') }}"></script>
    <script src="{{ asset('back-office/js/wow.min.js') }}"></script>
    <script src="{{ asset('back-office/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('back-office/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('back-office/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back-office/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('back-office/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="{{ asset('back-office/js/jquery.core.js') }}"></script>
    <script src="{{ asset('back-office/js/jquery.app.js') }}"></script>
    <script src="{{ asset('back-office/js/buttonLoader.js') }}"></script>
    <script src="{{ asset('back-office/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back-office/plugins/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back-office/plugins/notifyjs/dist/notify.min.js') }}"></script>
    <script src="{{ asset('back-office/plugins/notifications/notify-metro.js') }}"></script>
    <script src="{{ asset('back-office/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back-office/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back-office/js/init/init_general.js') }}"></script>
    @stack('scripts')
</body>
</html>
