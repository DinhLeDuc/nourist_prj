@extends('User::layouts.default')

@section('content')
    <div class="container m-t-top">
        <div class="row">
            <div id="login-page" class="box-main">
                <h3 class="text-center m-b-20 m-t-0">{{ __('Gửi mail khôi phục tài khoản ') }}</h3>

                @if (session('forgot-error'))
                    <div class="alert alert-danger">
                    <p>{{ session('forgot-error') }}</p>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                    </div>
                @endif
                <form method="POST" action="{{ route('password.forgot') }}">
                    {{ csrf_field() }}

                    <div class="form-group m-b-24 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">{{ __('Email khôi phục') }}: </label>
                        <input id="email" type="email" class="form-control form-custom" name="email" value="" placeholder="{{ __('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </span>
                        @endif
                    </div>

                    <div class="form-group m-b-24">
                        <button type="submit" class="btn btn-primary with-full btn-custom">{{ __('Gửi mail') }} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection