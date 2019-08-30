@extends('User::layouts.default')

@section('styles')
@stop

@section('content')
    <div class="container m-t-top" id="register-page">
        <div class="row">
            <div class="col-md-12 box-main">
                <h3 class="text-center m-b-20 m-t-0">{{ __('đăng ký') }}</h3>
                @if ($message = Session::get('error'))
                    <div class="alert alert-error">{{ $message }}</div>
                @endif
    
                <form action="{{ route('register') }}" id="vali-form" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loại tài khoản *</label>
                                <select name="group_id" class="form-control form-custom {{ $errors->has('group_id') ? ' is-invalid' : '' }}" id="group_id">
                                    <option value="" selected disabled>-- Chọn loại tài khoản --</option>
                                    @foreach ($groups as $key => $value)
                                        <option value="{{ $key }}"
                                            @if ($key == old('group_id'))
                                                selected="selected"
                                            @endif
                                        >
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('group_id'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('group_id') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username *</label>
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control form-custom {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('username') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="text" name="email" id="email" placeholder="Email" class="form-control form-custom {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Mật khẩu *</label>
                                <input type="password" name="password" id="password" placeholder="Mật khẩu" class="form-control form-custom {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhập lại Mật khẩu *</label>
                                <input type="password" name="password_confirmation" placeholder="Mật khẩu" class="form-control form-custom {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" value="{{ old('password_confirmation') }}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone_number" placeholder="Số điện thoại" class="form-control form-custom {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" value="{{ old('phone_number') }}">
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('phone_number') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" name="fullname" placeholder="Họ và tên" class="form-control form-custom {{ $errors->has('fullname') ? ' is-invalid' : '' }}" value="{{ old('fullname') }}">
                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('fullname') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <div class="upload-img-item">
                                    <div class="action">
                                        <input type='file' id="avatar" name="avatar" accept="image/x-png,image/gif,image/jpeg"  />
                                    </div>
                                    <div id="avatar_preview" class="m-t-12">
                                        <img src="{{ asset('images/default_user.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 {{ (old('group_id') == 2) ? '' : 'hidden' }}" id="group-host">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên thương hiệu</label>
                                        <input type="text" name="brand_name" placeholder="Tên thương hiệu" class="form-control form-custom {{ $errors->has('brand_name') ? ' is-invalid' : '' }}" value="{{ old('brand_name') }}">
                                        @if ($errors->has('brand_name'))
                                            <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('brand_name') }}</small>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số khách có thể phục vụ</label>
                                        <input type="number" min="1" name="max_people" placeholder="Số khách có thể phục vụ" class="form-control form-custom {{ $errors->has('max_people') ? ' is-invalid' : '' }}" value="{{ old('max_people') }}">
                                        @if ($errors->has('max_people'))
                                            <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('max_people') }}</small>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố *</label>
                                        <select name="city" class="form-control form-custom {{ $errors->has('city') ? ' is-invalid' : '' }}" id="host_city">
                                            <option value="" selected disabled>-- Tỉnh/Thành phố: --</option>
                                            @foreach ($citys as $key => $value)
                                                <option value="{{ $value }}"
                                                    @if ($value == old('city'))
                                                        selected="selected"
                                                    @endif
                                                >
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('city') }}</small>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quận huyện *</label>
                                        <select name="district" class="form-control form-custom {{ $errors->has('district') ? ' is-invalid' : '' }}" id="host_district">
                                            <option value="" selected disabled>-- Quận huyện  --</option>
                                        </select>
                                        <div class="district_loadding hidden"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>
                                        @if ($errors->has('district'))
                                            <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('district') }}</small>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address" placeholder="Địa chỉ" class="form-control form-custom {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}">
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('address') }}</small>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Giới thiệu về quán</label>
                                        <textarea name="introduction" class="form-control form-custom {{ $errors->has('introduction') ? ' is-invalid' : '' }}"  id="host_introduction" rows="5">{{ old('introduction') }}</textarea>
                                        @if ($errors->has('introduction'))
                                            <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('introduction') }}</small>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-12 {{ (old('group_id') == 3) ? '' : 'hidden' }}" id="group-guest">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Quốc gia</label>
                                    <input type="text" name="countryside" placeholder="Quốc gia" class="form-control form-custom {{ $errors->has('countryside') ? ' is-invalid' : '' }}" value="{{ old('countryside') }}">
                                    @if ($errors->has('countryside'))
                                        <span class="help-block">
                                            <small class="text-danger">{{ $errors->first('countryside') }}</small>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <br>
                            <div class="form-group text-center mb- mt-4">
                                <button class="btn btn-primary btn-custom" type="submit">{{ __('đăng ký') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        var old_district = "{{ old('district') }}"
    </script>
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('modules/admin/js/user.js') }}"></script>
@stop
