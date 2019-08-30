@extends('Admin::layouts.admin')

@section('title', __('Dánh sách Người dùng'))

@section('content')
    <div class="col-md-12">
        <div class="card-box">
            <div class="float-right mb-3">
                <a href="{{ route('admin.article_samples.create') }}" class="btn btn-info width-md">{{ __('thêm mới') }}</a>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-info">{{ $message }}</div>
            @endif
 
            <div class="table-responsive">
                <table class="table table-hover table-sm mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ _('tiêu đề') }}</th>
                            <th>{{ _('avatar') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articleSamples as $key => $article_sample)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $article_sample->title }}</td>
                                <td><img src="{{ asset($article_sample->avatar) }}" alt="" class="rounded-circle tbl-img-avatar"></td>
                                <td>
                                    <form action="{{ route('admin.article_samples.destroy',$article_sample->id) }}" method="POST" class="delete-form-{{ $article_sample->id }}">
                                        {{ method_field('DELETE') }}
                                        {!! csrf_field() !!}
                                        {{-- <a href="{{ route('admin.article_samples.show', $article_sample->id) }}" class="btn btn-sm btn-action btn-outline-warning"><i class="fas fa-eye"></i></a> --}}
                                        <a href="{{ route('admin.article_samples.edit', $article_sample->id) }}" class="btn btn-sm btn-action btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-sm btn-action btn-outline-danger" onclick="comfirmDelete('.delete-form-' + {{ $article_sample->id }})"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @include('Admin::includes.pagination', ['datas' => $articleSamples])
            </div>
        </div>
    </div>
@stop
