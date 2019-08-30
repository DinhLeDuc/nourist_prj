@extends('User::layouts.host')

@section('title', __('Food'))

@section('content')
    <div class="row m-b-12">
        <div class="col-md-6">
            <div class="text-left">
                <h3 class="host-title">{{ __('danh sách bữa ăn') }}</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-right">
                <a href="{{ route('meals.create') }}" class="btn btn-info">{{ __('thêm bữa ăn') }}</a>
            </div>
        </div>
    </div>
    <div class="box-main">
        <form action="{{ route('meals.index') }}" class="m-b-24">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>{{ __('tên bữa ăn') }}</label>
                        <input type="text" name="keyword" placeholder="{{ __('tên bữa ăn') }}" class="form-control form-custom" value="{{ isset($searchInput['keyword']) ? $searchInput['keyword'] : '' }}"">
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
                <div class="col-sm-6 col-md-3"></div>
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
                    
                </tbody>
            </table>
        </div>
    </div>
@stop
