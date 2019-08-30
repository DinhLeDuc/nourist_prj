<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{ asset('modules/admin/images/favicon.ico') }}">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/admin/css/app.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/admin/css/style.css') }}" rel="stylesheet" type="text/css"/>

    @yield('styles')

    <script src="{{ asset('modules/admin/js/vendor.min.js') }}"></script>
</head>
<body>
    <div id="wrapper">
        @include('Admin::includes.topbar')

        @include('Admin::includes.sidebar')

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>

            @include('Admin::includes.footer')
        </div>
    </div>

    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    @yield('scripts')

    <script src="{{ asset('modules/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>