@extends('User::layouts.host')

@section('title', __('thêm bữa ăn'))

@section('content')
    <h3 class="host-title">{{ __('thêm bữa ăn') }}</h3>
    <div class="list-languge m-t-12 m-b-12">
        <button type="button" class="btn btn-light btn-laguage text-dark">{{ __('VN') }}</button>
        <button type="button" class="btn btn-outline-light btn-laguage text-dark">{{ __('EN') }}</button>
        <button type="button" class="btn btn-outline-light btn-laguage text-dark">{{ __('JP') }}</button>
        <button type="button" class="btn btn-outline-light btn-laguage text-dark">{{ __('PK') }}</button>
    </div>
    
    <div class="box-main">
        <form action="{{ route('meals.store') }}" id="vali-form-food" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            @include('commons.title', ['title_data' => ['lable' => __('tên bữa ăn'), 'table' => 'meals', 'slug' => __('bua-an') ]])
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('giá bữa ăn') }} *</label>
                                <input type="text" name="price" placeholder="{{ __('giá bữa ăn') }}" class="form-control form-custom {{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('price') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('số lượng người ăn') }} *</label>
                                <input type="number" name="number" placeholder="{{ __('số lượng người ăn') }}" class="form-control form-custom {{ $errors->has('number') ? ' is-invalid' : '' }}" value="{{ old('number') }}">
                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <small class="text-danger">{{ $errors->first('number') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('thông tin bữa ăn') }}</label>
                                @include('commons.editor', ['editor_value' => old('introduction',  $foodDetail->introduction ?? null)])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-body">
                            <button class="btn btn-primary btn-sm pull-left">{{ __('lưu bản nháp') }}</button>
                            <button class="btn btn-primary btn-sm pull-right">{{ __('thêm bữa ăn') }}</button>
                            <br><br>
                        </div>
                    </div>

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('món ăn') }}</h3>
                        </div>
                        <div class="box-body">
                            <div class="list-food-type">
                                @foreach ($foods as $key => $food)
                                    <label class="custom-checkbox host-checkbox">
                                        {{ $food->name }}
                                        <input type="checkbox" name="foods[]" value="{{ $food->id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('loai bữa ăn') }}</h3>
                        </div>
                        <div class="box-body">
                            <label class="custom-checkbox host-checkbox">
                                {{ __('bữa sáng') }}
                                <input type="checkbox" name="meal_type[]" value="{{ __('bữa sáng') }}">
                                <span class="checkmark"></span>
                            </label>
                            <label class="custom-checkbox host-checkbox">
                                {{ __('bữa trưa') }}
                                <input type="checkbox" name="meal_type[]" value="{{ __('bữa trưa') }}">
                                <span class="checkmark"></span>
                            </label>
                            <label class="custom-checkbox host-checkbox">
                                {{ __('bữa tối') }}
                                <input type="checkbox" name="meal_type[]" value="{{ __('bữa tối') }}">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('ảnh đại diện') }}</h3>
                        </div>
                        <div class="box-body">
                            <input type="hidden" class="form-control" name="avatar" id="file_avatar">
                            <div id="avatar"></div>
                            <div id="get-media" class="text-center">
                                <a class="media-get" href="javascript:void(0)" data-toggle="modal" data-target="#mediaModal" onclick="setMediaAvatar(true)">{{ __('chọn ảnh đại diện') }}</a>
                            </div>
                            <div id="remove-avatar" style="display: none"><a href="javascript:void(0)">{{ __('xóa ảnh đại diện') }}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('scripts')

@stop
