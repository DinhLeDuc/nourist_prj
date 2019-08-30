<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('modules/admin/images/favicon.ico') }}">
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/user/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/core.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/user/css/menu.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/user/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/user/css/pagination.css') }}" rel="stylesheet" type="text/css"/>

    @yield('styles')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<body>
    <div id='top-page'>
        @include('User::includes.header')

        <div class="content" id='content-body' style="margin-top: 55px; min-height: calc(100vh - 195px);">
            @yield('content')
        </div>

        <div class="clear"></div>
        <footer class="m-t-24">
            @include('User::includes.footer')
        </footer>
    </div>

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('modules/user/app.js') }}"></script>

    @yield('scripts')
</body>
</html>