@extends('Admin::layouts.admin')

@section('title', __('Thêm lọai món ăn'))

@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Cập nhật thông tin Khách hàng</h4>

            <div class="clearfix"></div>

            @if ($message = Session::get('error'))
                <div class="alert alert-error">{{ $message }}</div>
            @endif

            <form action="{{ route('admin.users.update', $user->id) }}" id="vali-form" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Loại khách hàng *</label>
                            <select name="group_id" class="form-control {{ $errors->has('group_id') ? ' is-invalid' : '' }}">
                                <option value="" selected disabled>-- Chọn loại khách hàng --</option>
                                <?php
                                    $old_group_id = (old('group_id')) ? old('group_id') : $user->group_id
                                ?>
                                @foreach ($groups as $key => $value)
                                    <option value="{{ $key }}"
                                        @if ($key == $old_group_id)
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
                            <input type="text" name="username" id="username" required placeholder="Username" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ (old('username')) ? old('username') : $user->username }}">
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
                            <input type="text" name="email" id="email" required placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ (old('email')) ? old('email') : $user->email }}">
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
                            <input type="password" name="password" id="password" placeholder="Mật khẩu" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">
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
                            <input type="text" name="phone_number" placeholder="Số điện thoại" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" value="{{ (old('phone_number')) ? old('phone_number') : $user->phone_number }}">
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
                            <input type="text" name="fullname" placeholder="Họ và tên" class="form-control {{ $errors->has('fullname') ? ' is-invalid' : '' }}" value="{{ (old('fullname')) ? old('fullname') : $user->fullname  }}">
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
                            <?php
                                $old_status = (old('status')) ? old('status') : $user->status
                            ?>
                            <select name="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                <option value="{{ USER_STATUS_ACTIVE }}" {{ ($old_status == USER_STATUS_ACTIVE) ? 'selected' : '' }}>Kích hoạt</option>
                                <option value="{{ USER_STATUS_VERIFY }}" {{ ($old_status == USER_STATUS_VERIFY) ? 'selected' : '' }}>Đợi xác thực</option>
                                <option value="{{ USER_STATUS_INACTIVE }}" {{ ($old_status == USER_STATUS_INACTIVE) ? 'selected' : '' }}>Không kích hoạt</option>
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
                                <div class="avatar_preview" class="mt-2">
                                    <img src="{{ asset($user->avatar) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" placeholder="Địa chỉ" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ (old('address')) ? old('address') : $user->address }}">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('address') }}</small>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="form-group text-right mb-0">
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
                },
                messages: {
                    group_id: {
                        required: "Vui lòng chọn loại khách hàng."
                    },
                    username: {
                        required: "Vui lòng nhập username."
                    },
                    email: {
                        required: "Vui lòng nhập địa chỉ email.",
                        email: "Sai định dạng Email."
                    },
                }
            });

            $("#avatar").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#avatar_preview img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('input[name=username]').change(function() {
                $(this).val($(this).val().toLowerCase());
            })
        });
    </script>
@stop
