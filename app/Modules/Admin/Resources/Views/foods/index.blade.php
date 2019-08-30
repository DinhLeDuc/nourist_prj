@extends('Admin::layouts.admin')

@section('title', __('Dánh sách món ăn'))

@section('content')
    <div class="col-md-12">
        <div class="card-box">
            <div class="float-right mb-3">
                <a href="{{ route('admin.foods.create') }}" class="btn btn-info width-md">{{ __('thêm mới') }}</a>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
@stop
