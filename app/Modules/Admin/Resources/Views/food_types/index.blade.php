@extends('Admin::layouts.admin')

@section('title', __('Dánh sách loại món ăn'))

@section('content')
    <div class="col-md-12">
        <div class="card-box">
            <div class="float-right mb-3">
                <a href="{{ route('admin.food-type.create') }}" class="btn btn-info width-md">Thêm mới</a>
            </div>

            <div class="clearfix"></div>

            @if ($message = Session::get('success'))
                <div class="alert alert-info">{{ $message }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-sm mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('tên loại món ăn') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($foodTypes as $key => $type)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $type->name }}</td>
                                <td>
                                    <form action="{{ route('admin.food-type.destroy',$type->id) }}" method="POST" class="delete-form-{{ $type->id }}">
                                        {{ method_field('DELETE') }}
                                        {!! csrf_field() !!}
                                        <a href="{{ route('admin.food-type.edit', $type->id) }}" class="btn btn-sm btn-action btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-sm btn-action btn-outline-danger" onclick="comfirmDelete('.delete-form-' + {{ $type->id }})"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @include('Admin::includes.pagination', ['datas' => $foodTypes])
            </div>
        </div>
    </div>
@stop
