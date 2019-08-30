@extends('Admin::layouts.admin')

@section('title', __('Dánh sách Người dùng'))

@section('content')
    <div class="col-md-12">
        <div class="card-box">
            <div class="float-right mb-3">
                <a href="{{ route('admin.users.create') }}" class="btn btn-info width-md">{{ __('thêm mới') }}</a>
            </div>

            <div class="clearfix"></div>
            
            <form action="{{ route('admin.users.index') }}">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label>Tên, Username, Email, Số điện thoại</label>
                            <input type="text" name="keyword" placeholder="Tên, Username, Email, Số điện thoại" class="form-control" value="{{ isset($searchInput['keyword']) ? $searchInput['keyword'] : '' }}"">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Loại Người dùng</label>
                            <select name="group_id" class="form-control">
                                <option value="all" selected>Tất cả</option>
                                @foreach ($groups as $key => $value)
                                    <option value="{{ $key }}"
                                        @if (isset($searchInput['group_id']) && $key == $searchInput['group_id'])
                                            selected="selected"
                                        @endif
                                        >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <?php $statusSearch = (isset($searchInput['status'])) ? $searchInput['status'] : ''; ?>
                            <select name="status" class="form-control">
                                <option value="all" selected>Tất cả</option>
                                <option value="{{ USER_STATUS_ACTIVE }}" {{ ($statusSearch == USER_STATUS_ACTIVE) ? 'selected' : '' }}>Đang kích hoạt</option>
                                <option value="{{ USER_STATUS_VERIFY }}" {{ ($statusSearch == USER_STATUS_VERIFY) ? 'selected' : '' }}>Đợi xác thực</option>
                                <option value="{{ USER_STATUS_INACTIVE }}" {{ ($statusSearch == USER_STATUS_INACTIVE) ? 'selected' : '' }}>Không kích hoạt</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <button type="submit" class="btn btn-bordred-primary waves-effect width-md btn-search">Tìm kiếm</button>
                    </div>
                </div>
            </form>

            @if ($message = Session::get('success'))
                <div class="alert alert-info">{{ $message }}</div>
            @endif
 
            <div class="table-responsive">
                <table class="table table-hover table-sm mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>Tên</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Loại Người dùng</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td><img src="{{ asset($user->avatar) }}" alt="" class="rounded-circle tbl-img-avatar"></td>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->group->name }}</td>
                                <td>{{ $user->status_vn }}</td>
                                <td>
                                    <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST" class="delete-form-{{ $user->id }}">
                                        {{ method_field('DELETE') }}
                                        {!! csrf_field() !!}
                                        {{-- <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-action btn-outline-warning"><i class="fas fa-eye"></i></a> --}}
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-action btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-sm btn-action btn-outline-danger" onclick="comfirmDelete('.delete-form-' + {{ $user->id }})"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @include('Admin::includes.pagination', ['datas' => $users])
            </div>
        </div>
    </div>
@stop
