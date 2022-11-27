<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <title>Login - Bindu Digital Diary</title>
    <link href="{{ asset ('/coreui/node_modules/coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/node_modules/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/node_modules/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/src/css/prime.css') }}" rel="stylesheet">
    <link href="{{ asset ('/coreui/src/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    @stack('stylesheets')

</head>
<body class="app flex-row align-items-center">
    @yield('content')
    <script src="{{ asset ('/coreui/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset ('/coreui/node_modules/coreui/coreui/dist/js/coreui.min.js') }}"></script>
    <script src="{{ asset ('/coreui/plugins/validate/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset ('/coreui/plugins/validate/validation.js') }}" type="text/javascript"></script>
</html>
