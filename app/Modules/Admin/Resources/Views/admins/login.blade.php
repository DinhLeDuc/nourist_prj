
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{ asset('modules/admin/images/favicon.ico') }}">
    <title>login - {{ config('app.name') }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/admin/css/app.min.css') }}" rel="stylesheet" type="text/css"/>

    @yield('styles')
</head>
<body>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-2">
                                <h4 class="text-uppercase mt-0">{{ __('đăng nhập') }}</h4>
                            </div>
                            
                            @if(Session::has('login-error'))
                                <div class="alert alert-warning">{{ Session::get('login-error') }}</div>
                            @endif
                            <form action="{{ route('admin.login') }}" method="POST">
                                {!! csrf_field() !!}
                                <div class="form-group mb-3">
                                    <label for="emailaddress">{{ __('email') }}</label>
                                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" id="emailaddress" name="email" placeholder="Nhập email của bạn" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">{{ __('mật khẩu') }}</label>
                                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"  value="{{ old('password') }}" type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="checkbox-signin">
                                        <label class="custom-control-label" for="checkbox-signin">{{ __('nhớ mật khẩu') }}</label>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> {{ __('đăng nhập') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>