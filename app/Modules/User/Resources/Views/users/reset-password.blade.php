@extends('User::layouts.default')

@section('content')
    <div class="container m-t-top">
        <div class="row">
            <div id="login-page" class="box-main">
                <h3 class="text-center m-b-20 m-t-0">{{ __('Lấy lại Mật khẩu của bạn') }}</h3>
                @if (session('success'))
                    <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.reset',$user->token) }}">
                    {{ csrf_field() }}
                    
                    <div class="form-group m-b-24 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">{{ __('mật khẩu') }}</label>
                        <input id="password" type="password" class="form-control form-custom" name="password" placeholder="{{ __('mật khẩu') }}" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </span>
                        @endif
                    </div>
                    <div class="form-group m-b-24 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">{{ __('Xác nhận mật khẩu') }}</label>
                        <input id="password" type="password" class="form-control form-custom" name="confirmpassword" placeholder="{{ __('Xác nhận mật khẩu') }}" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </span>
                        @endif
                    </div>
    
                    <div class="form-group m-b-24">
                        <button type="submit" class="btn btn-primary with-full btn-custom">{{ __('Đổi mật khẩu') }} </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
