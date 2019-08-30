@extends('User::layouts.host')

@section('title', __('cập nhật thông tin món ăn'))

@section('content')
    <h3 class="host-title">{{ __('cập nhật thông tin món ăn') }}</h3>
    <form action="{{ route('foods.update', [$food->id, $food_detail_id, $langCurrent]) }}" method="POST">
        @include('User::foods._form', ['form_title' => __('cập nhật món ăn'), 'routeName' => 'edit'])
    </form>
@stop

@section('scripts')
@stop
