@extends('User::layouts.default')

@section('content')
    <div class="container m-t-top">
        <div class="row">
            <div id="login-page" class="box-main">
                <h3 class="text-center m-b-20 m-t-0">{{ __('đăng nhập') }}</h3>

                @if(Session::has('login-error'))
                    <div class="alert alert-warning">{{ Session::get('login-error') }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
    
                    <div class="form-group m-b-24 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">{{ __('email') }}: </label>
                        <input id="email" type="email" class="form-control form-custom" name="email" value="{{ old('email') }}" placeholder="{{ __('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </span>
                        @endif
                    </div>
    
                    <div class="form-group m-b-24 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">{{ __('mật khẩu') }}</label>
                        <input id="password" type="password" class="form-control form-custom" name="password" placeholder="{{ __('mật khẩu') }}" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </span>
                        @endif
                    </div>
    
                    <div class="form-group m-b-24">
                        <label class="custom-checkbox">
                            {{ __('nhớ mật khẩu') }}
                            <input type="checkbox" name="remember" value="1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
    
                    <div class="form-group m-b-24">
                        <button type="submit" class="btn btn-primary with-full btn-custom">{{ __('đăng nhập') }} </button>
                    </div>
                    <div class="form-group m-b-24">
                        <a class="btn btn-link pull-left" href="{{ route('forgot.form') }}">
                            {{ __('quên mật khẩu') }}
                        </a>
                        <a class="btn btn-link pull-right" href="{{ route('register') }}">
                            {{ __('đăng ký mới') }}
                        </a>
                        <br>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
