@extends('Admin::layouts.admin')

@section('title', __('Thêm lọai món ăn'))

@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">{{ __('thêm loại món ăn') }}</h4>

            <div class="clearfix"></div>

            @if ($message = Session::get('error'))
                <div class="alert alert-error">{{ $message }}</div>
            @endif

            <form action="{{ route('admin.food-type.store') }}" id="vali-form" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="name">{{ __('tên loại món ăn') }} *</label>
                    <input type="text" name="name" id="name" required placeholder="{{ __('tên loại món ăn') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </span>
                    @endif
                </div>

                <div class="form-group text-right mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">{{ __('Lưu') }}</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#vali-form').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Vui lòng nhập Tên loại."
                    },
                }
            });
        });
    </script>
@stop
