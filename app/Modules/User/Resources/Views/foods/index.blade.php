@extends('User::layouts.host')

@section('title', __('Food'))

@section('content')
    <div class="row m-b-12">
        <div class="col-md-6">
            <div class="text-left">
                <h3 class="host-title">{{ __('danh sách món ăn') }}</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-right">
                <a href="{{ route('foods.create', app()->getLocale()) }}" class="btn btn-info">{{ __('thêm món ăn') }}</a>
            </div>
        </div>
    </div>
    <div class="box-main">
        <form action="{{ route('foods.index') }}" class="m-b-24">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>{{ __('tên món ăn') }}</label>
                        <input type="text" name="keyword" placeholder="{{ __('tên món ăn') }}" class="form-control form-custom" value="{{ isset($searchInput['keyword']) ? $searchInput['keyword'] : '' }}"">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>{{ __('loại món ăn') }}</label>
                        <select name="food_type_id" class="form-control form-custom">
                            <option value="all" selected>Tất cả</option>
                            @foreach ($foodTypes as $key => $value)
                                <option value="{{ $key }}"
                                    @if (isset($searchInput['food_type_id']) && $key == $searchInput['food_type_id'])
                                        selected="selected"
                                    @endif
                                >{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>{{ __('trạng thái') }}</label>
                        <?php $statusSearch = (isset($searchInput['status'])) ? $searchInput['status'] : ''; ?>
                        <select name="status" class="form-control form-custom">
                            <option value="all" selected>Tất cả</option>
                            <option value="{{ USER_STATUS_ACTIVE }}" {{ ($statusSearch == USER_STATUS_ACTIVE) ? 'selected' : '' }}>Đang kích hoạt</option>
                            <option value="{{ USER_STATUS_VERIFY }}" {{ ($statusSearch == USER_STATUS_VERIFY) ? 'selected' : '' }}>Đợi xác thực</option>
                            <option value="{{ USER_STATUS_INACTIVE }}" {{ ($statusSearch == USER_STATUS_INACTIVE) ? 'selected' : '' }}>Không kích hoạt</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 text-right">
                    <button type="submit" class="btn btn-primary btn-custom m-t-24">{{ __('tìm kiếm') }}</button>
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
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $key => $food)
                        @php
                            $detail = $food->detail_lang();
                        @endphp
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td><img src="{{ asset($food->avatar) }}" alt="" class="rounded-circle tbl-img-avatar"></td>
                            <td>{{ (!empty($detail)) ? $detail->name : '' }}</td>
                            <td>{{ (!empty($detail)) ? $detail->price : '' }}</td>
                            <td>{{ $food->number }}</td>
                            <td>{{ __($food->status) }}</td>
                            <td>
                                <form action="{{ route('foods.destroy',$food->id) }}" method="POST" class="delete-form-{{ $food->id }}">
                                    {{ method_field('DELETE') }}
                                    {!! csrf_field() !!}
                                    {{-- <a href="{{ route('foods.show', $food->id) }}" class="btn btn-sm btn-action btn-warning"><i class="fas fa-eye"></i></a> --}}
                                    <a href="{{ route('foods.edit', [$food->id, $detail->id ?? 0, $detail->language ?? 'vi']) }}" class="btn btn-sm btn-action btn-outline-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <button type="button" class="btn btn-sm btn-action btn-outline-danger" onclick="comfirmDelete('.delete-form-' + {{ $food->id }})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @include('User::includes.pagination', ['datas' => $foods])
        </div>
    </div>
@stop
