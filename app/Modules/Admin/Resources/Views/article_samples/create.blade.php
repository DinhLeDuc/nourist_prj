@extends('Admin::layouts.admin')

@section('title', __('thêm bài viết mẫu'))

@section('styles')
@stop

@section('content')
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">{{ __('thêm bài viết mẫu') }}</h4>

            <div class="clearfix"></div>

            @if ($message = Session::get('error'))
                <div class="alert alert-error">{{ $message }}</div>
            @endif

            <form action="{{ route('admin.article_samples.store') }}" id="vali-form" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">{{ __('tiêu đề bài viết') }} *</label>
                            <input type="text" name="title" id="title" placeholder="{{ __('tên bài viết') }}" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{ __('ảnh đại diện') }}</label>
                            <div class="upload-img-item">
                                <div class="action">
                                    <input type='file' id="avatar" name="avatar" accept="image/x-png,image/gif,image/jpeg"  />
                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                            <small class="text-danger">{{ $errors->first('avatar') }}</small>
                                        </span>
                                    @endif
                                </div>
                                <div class="avatar_preview mt-2">
                                    <img src="{{ asset('images/default_user.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{ __('nội dung') }}</label>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('content') }}</small>
                                </span>
                            @endif
                            @include('commons.editor', ['editor_value' => old('content',  $foodDetail->content ?? null)])
                        </div>
                    </div>
                </div>
                
                <div class="form-group text-right mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">{{ __('lưu') }}</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
@stop
