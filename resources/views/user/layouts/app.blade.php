<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <title>{{ $title }}</title>
    <!-- Icons-->
    <link href="{{ asset ('/coreui/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/node_modules/coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/node_modules/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/node_modules/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset ('/coreui/src/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset ('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/src/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <!-- Page CSS -->
    @stack('stylesheets')
    <!-- color CSS -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    @include('user/includes/top')
    <div class="app-body">
        @include('user/includes/sidebar')
        <main class="main">
            <ol class="breadcrumb">
                @if ($pageHeading != 'Dashboard')
                    <li class="breadcrumb-item"><a href="{{ route('user.category') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><b>{{ $pageHeading }}</b></li>
                @else
                    <li class="breadcrumb-item active"><b>{{ $pageHeading }}</b></li>
                @endif
            </ol>
            @yield('content')
        </main>
    </div>
    @include('user/includes/footer')
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset ('/coreui/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/coreui/coreui-pro/js/coreui.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset ('/coreui/node_modules/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js') }}"></script>
    <script src="{{ asset ('/coreui/src/js/main.js') }}"></script>
    <script>
        $('#ui-view').ajaxLoad();
        $(document).ajaxComplete(function() {
            Pace.restart();
        });
    </script>
    @stack('scripts')
</body>
</html>
