<div class="col-md-12 search-margin-top">
    <form action="{{ route('homes.search') }}" method="GET" class="searchbox-form">
        <div class="row filter-content">
            <div class="col-md-10 col-sm-12 padding-0">
                <div class="filter-form-1 row">
                    <div class="form-group has-feedback col-md-4 col-sm-4">
                        <label class="control-label">{{ __('bạn đang ở đâu?') }}</label>
                        <input type="text" name="position" class="form-control" placeholder="Ha Noi" id="search_position" value="{{ isset($searchParam['position']) ? $searchParam['position'] : '' }}">
                        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback col-md-3 col-sm-3">
                        <label class="control-label">{{ __('tên món ăn') }}</label>
                        <input type="text" name="food_name" class="form-control" placeholder="Bun Oc" value="{{ isset($searchParam['food_name']) ? $searchParam['food_name'] : '' }}">
                        <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback col-md-3 col-sm-3">
                        <label class="control-label">{{ __('thời gian') }}</label>
                        <input type="text" name="time_eat" class="form-control datepicker" placeholder="29/07/2019">
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <label class="control-label">{{ __('khách') }}</label>
                        <input type="number" name="guest_number" min="1" placeholder="{{ __('khách') }}" class="form-control">
                    </div>
                </div>
                <div class="filter-form-2 row">
                    <div class="col-md-3 col-sm-4">
                        <label class="item-meal meal-1">
                            <div class="title-meal"><img src="{{asset('modules/user/img/morning.png')}}">{{ __('bữa sáng') }}</div>
                            <input name="meal" type="checkbox" name="radio" value="1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-3  col-sm-4">
                        <label class="item-meal meal-2">
                            <div class="title-meal"><img src="{{asset('modules/user/img/lunch.png')}}">{{ __('bữa trưa') }}</div>
                            <input name="meal" type="checkbox" checked="checked" name="radio" value="2">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <label class="item-meal meal-3">
                            <div class="title-meal"><img src="{{asset('modules/user/img/night.png')}}">{{ __('bữa tối') }}</div>
                            <input name="meal" type="checkbox" name="radio" value="3">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-2 padding-0">
                <div style="height: 100%;width: 100%;display: flex;">
                    <button class="btn btn-search">{{ __('tìm kiếm') }}</button>
                </div>
            </div>
        </div>
    </form> 
</div>
