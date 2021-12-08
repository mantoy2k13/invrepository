<html prefix="og: http://ogp.me/ns#" lang="en" class="auth-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cyber Capital Group - @yield('title')">
    <meta name="author" content="Denver Web Development">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('back-office/images/favicon-32x32.png') }}" sizes="32x32" />
    <meta property="og:title" content="@yield('title') | Cyber Capital Group" />
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="{{ url('/') }}" />
	<meta property="og:site_name" content="@yield('title') | Cyber Capital Group" />
    <meta property="og:description" content="Cyber Capital Group Login" />
    <meta property="og:image" content="{{ asset('back-office/images/og-img.png') }}" />
	<meta property="og:image:secure_url" content="{{ asset('back-office/images/og-img.png') }}" />
	<meta property="og:image:alt" content="@yield('title') | Cyber Capital Group" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <title>@yield('title') | Cyber Capital Group</title>
    <link href="{{ asset('back-office/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-office/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('back-office/js/modernizr.min.js') }}"></script>
    @yield('styles')
</head>
<body class="fixed-left">
    <div class="clearfix"></div>
        <div class="wrapper-page custom-login-page">
        	<div class="card-box">
                @yield('content')
            </div>
        </div>
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
    <script src="{{ asset('back-office/js/jquery.core.js') }}"></script>
    <script src="{{ asset('back-office/js/jquery.app.js') }}"></script>
    <script src="{{ asset('back-office/js/buttonLoader.js') }}"></script>
    <script src="{{ asset('back-office/plugins/notifyjs/dist/notify.min.js') }}"></script>
    <script src="{{ asset('back-office/plugins/notifications/notify-metro.js') }}"></script>
    @stack('scripts')
</body>
</html>
