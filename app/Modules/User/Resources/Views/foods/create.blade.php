@extends('User::layouts.host')

@section('title', __('thêm món ăn'))

@section('content')
    <h3 class="host-title">{{ __('thêm món ăn') }}</h3>
    <form action="{{ route('foods.store', $langCurrent) }}" method="POST">
        @include('User::foods._form', ['form_title' => __('thêm món ăn'), 'routeName' => 'create'])
    </form>
@stop
