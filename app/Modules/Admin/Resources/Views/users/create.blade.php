@extends('Admin::layouts.admin')

@section('title', __('Thêm lọai món ăn'))

@section('styles')
    <style>
        .district_loadding {
            text-align: center;
            margin-top: -32px;
            font-size: 20px;
        }
    </style>
@stop

@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Thêm người dùng</h4>

            <div class="clearfix"></div>

            @if ($message = Session::get('error'))
                <div class="alert alert-error">{{ $message }}</div>
            @endif

            <form action="{{ route('admin.users.store') }}" id="vali-form" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Loại người dùng *</label>
                            <select name="group_id" class="form-control {{ $errors->has('group_id') ? ' is-invalid' : '' }}" id="group_id">
                                <option value="" selected disabled>-- Chọn loại người dùng --</option>
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
                            <input type="text" name="username" id="username" required placeholder="Username" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}">
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
                            <input type="text" name="email" id="email" required placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
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
                            <input type="password" name="password" id="password" required placeholder="Mật khẩu" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone_number" placeholder="Số điện thoại" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" value="{{ old('phone_number') }}">
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
                            <input type="text" name="fullname" placeholder="Họ và tên" class="form-control {{ $errors->has('fullname') ? ' is-invalid' : '' }}" value="{{ old('fullname') }}">
                            @if ($errors->has('fullname'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('fullname') }}</small>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                <option value="{{ USER_STATUS_ACTIVE }}" {{ (old('status') == USER_STATUS_ACTIVE) ? 'selected' : '' }}>Đang kích hoạt</option>
                                <option value="{{ USER_STATUS_VERIFY }}" {{ (old('status') == USER_STATUS_VERIFY) ? 'selected' : '' }}>Đợi xác thực</option>
                                <option value="{{ USER_STATUS_INACTIVE }}" {{ (old('status') == USER_STATUS_INACTIVE) ? 'selected' : '' }}>Không kích hoạt</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
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
                                <div class="avatar_preview mt-2">
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
                                    <input type="text" name="brand_name" placeholder="Tên thương hiệu" class="form-control {{ $errors->has('brand_name') ? ' is-invalid' : '' }}" value="{{ old('brand_name') }}">
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
                                    <input type="number" min="1" name="max_people" placeholder="Số khách có thể phục vụ" class="form-control {{ $errors->has('max_people') ? ' is-invalid' : '' }}" value="{{ old('max_people') }}">
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
                                    <select name="city" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" id="host_city">
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
                                    <select name="district" class="form-control {{ $errors->has('district') ? ' is-invalid' : '' }}" id="host_district">
                                        <option value="" selected disabled>-- Quận huyện  --</option>
                                    </select>
                                    <div class="district_loadding hidden"><i class="fas fa-spinner fa-spin"></i></div>
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
                                    <input type="text" name="address" placeholder="Địa chỉ" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}">
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
                                    <textarea name="introduction" class="form-control {{ $errors->has('introduction') ? ' is-invalid' : '' }}"  id="host_introduction" rows="5">{{ old('introduction') }}</textarea>
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
                                <input type="text" name="countryside" placeholder="Quốc gia" class="form-control {{ $errors->has('countryside') ? ' is-invalid' : '' }}" value="{{ old('countryside') }}">
                                @if ($errors->has('countryside'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('countryside') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right mb- mt-4">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        var old_district = "{{ old('district') }}"
    </script>
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('modules/admin/js/user.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.validator.addMethod("nowhitespace", function(value, element) {
                return this.optional(element) || /^\S+$/i.test(value);
            }, "Không được nhập khoảng trống.");

            $('#vali-form').validate({
                rules: {
                    group_id: {
                        required: true,
                    },
                    username: {
                        required: true,
                        nowhitespace: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                    },
                    countryside: {
                        required: true,
                    },
                    brand_name: {
                        required: true,
                    },
                    max_people: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    district: {
                        required: true,
                    },
                },
                messages: {
                    group_id: {
                        required: "Vui lòng chọn loại người dùng."
                    },
                    username: {
                        required: "Vui lòng nhập username."
                    },
                    email: {
                        required: "Vui lòng nhập địa chỉ email.",
                        email: "Sai định dạng Email."
                    },
                    password: {
                        required: "Vui lòng nhập mật khẩu."
                    },
                    countryside: {
                        required: "Vui lòng nhập quốc gia."
                    },
                    brand_name: {
                        required: "Vui lòng nhập tên thương hiệu."
                    },
                    max_people: {
                        required: "Vui lòng nhập số khách có thể phục vụ."
                    },
                    city: {
                        required: "Vui lòng chọn tỉnh/thành phố."
                    },
                    district: {
                        required: "Vui lòng chọn quận huyện."
                    },
                }
            });
        });
    </script>
@stop
