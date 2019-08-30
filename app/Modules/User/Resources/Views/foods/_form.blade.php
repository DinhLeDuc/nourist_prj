{!! csrf_field() !!}
<div class="list-languge m-t-12 m-b-12">
    @php
        $food_detail_list =  $foodDetailList ?? [];
    @endphp
    @foreach ( Config::get('config.language') as $key => $cf_lang)
        @if ($key == $langCurrent)
            <a href="javascript:void(0)" class="btn btn-light btn-laguage text-dark text-capitalize">
                <img src="{{ asset('/images/'.$cf_lang) }}" class="rounded-circle" height="30px">
                {{ __($key) }}
            </a>
            <input type="hidden" value="{{ $key }}" name="language">
        @else
            @php
                if($routeName == 'edit') {
                    $langugeUrl = route('foods.edit', [$food->id, $food_detail_list[$key] ?? 0, $key]);
                } else {
                    $langugeUrl = route('foods.create', $key);
                }
            @endphp
            <a href="{{ $langugeUrl }}" class="btn btn-outline-light btn-laguage text-dark text-capitalize">
                <img src="{{ asset('/images/'.$cf_lang) }}" class="rounded-circle" height="30px">
                {{ __($key) }}
            </a>
        @endif
    @endforeach
</div>

<div class="box-main">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    @include('commons.title', ['title_data' => ['lable' => __('tên món ăn'), 'table' => 'foods', 'slug' => __('mon-an') ]])
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ __('giá') }} *</label>
                        <input type="text" name="price" placeholder="{{ __('giá') }}" class="form-control form-custom {{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price', $foodDetail->price ?? null) }}">
                        @if ($errors->has('price'))
                            <span class="help-block">
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ __('số lượng') }} *</label>
                        <input type="text" name="number" placeholder="{{ __('số lượng') }}" class="form-control form-custom {{ $errors->has('number') ? ' is-invalid' : '' }}" value="{{ old('number',  $food->number ?? null) }}">
                        @if ($errors->has('number'))
                            <span class="help-block">
                                <small class="text-danger">{{ $errors->first('number') }}</small>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>{{ __('công thức') }}</label>
                        <textarea name="recipe" class="form-control" id="food_recipe" rows="5">{{ old('recipe',  $foodDetail->recipe ?? null) }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>{{ __('lưu ý') }}</label>
                        <textarea name="note" class="form-control" id="food_note" rows="5">{{ old('note',  $foodDetail->note ?? null) }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>{{ __('thông tin món ăn') }}</label>
                        @include('commons.editor', ['editor_value' => old('introduction',  $foodDetail->introduction ?? null)])
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-body text-center">
                    {{-- <button class="btn btn-primary btn-sm pull-left">{{ __('lưu bản nháp') }}</button> --}}
                    <button type="submit" class="btn btn-primary btn-sm">{{ $form_title }}</button>
                </div>
            </div>

            <div class="box box-info {{ $errors->has('status') ? 'box-error' : '' }}">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('trạng thái') }}</h3>
                </div>
                <div class="box-body">
                    @php
                        $statusCheck =  old('status',  $food->status ?? FOOD_MEAL_PUBLIC);
                    @endphp
                    @foreach ( Config::get('config.food_status') as $key => $status)
                        @if ($status != FOOD_MEAL_TRASH)
                            <div class="custom-radio host-radio">
                                <input value="{{ $status }}" type="radio" name="status" id="status_{{ $key }}" {{ ($status == $statusCheck ) ? 'checked': '' }}>
                                <label for="status_{{ $key }}">{{ __($status) }}</label>
                            </div>   
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="box box-info {{ $errors->has('food_type') ? 'box-error' : '' }}">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('loại món ăn') }}</h3>
                </div>
                <div class="box-body">
                    <div class="list-food-type">
                        @php
                            $foodFoodTypes = old('food_type',  $foodFoodTypes ?? []);
                        @endphp
                        @foreach ($foodTypes as $key => $value)
                            <label class="custom-checkbox host-checkbox">
                                {{ $value }}
                                @php
                                    $checkFoodType = false;
                                    foreach ($foodFoodTypes as $food_type_id) {
                                        if($food_type_id == $key) {
                                            $checkFoodType = true;
                                            break;
                                        }
                                    }
                                @endphp
                                <input type="checkbox" name="food_type[]" value="{{ $key }}" {{  ($checkFoodType) ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                        @if ($errors->has('food_type'))
                            <span class="help-block">
                                <small class="text-danger">{{ $errors->first('food_type') }}</small>
                            </span>
                        @endif
                    </div>
                    <div class="form-group hidden">
                        <a id="show-hidden-form" href="javascript:void(0)" class="hide-if-no-js taxonomy-add-new">  + {{ __('thêm loại món ăn mơi') }}</a>
                    </div>
                    <div class="form-add-category hidden">
                        <div class="form-group">
                            <input type="text" name="foodTypeName" id="foodTypeName" class="form-control form-custom">
                            <span class="help-block hidden food-type-error">
                                <small class="text-danger"></small>
                            </span>
                        </div>
                        <div class="text-center">
                            <div class="btn btn-light btn-sm" id="addFoodType">{{ __('thêm loại') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box box-info {{ $errors->has('avatar') ? 'box-error' : '' }}">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('ảnh đại diện') }}</h3>
                </div>
                <div class="box-body">
                    @php
                        if(!empty(old('avatar', $food->avatar ?? null))) {
                            $avatarCheck = true;
                        } else {
                            $avatarCheck = false;
                        }
                    @endphp
                    <input type="hidden" class="form-control" name="avatar" id="file_avatar" value="{{ old('avatar', $food->avatar ?? null) }}">
                    <div id="avatar">
                        @if ($avatarCheck)
                            <img src="{{ old('avatar', $food->avatar ?? null) }}" class="img-thumbnail img-check">
                        @endif
                    </div>
                    <div id="get-media" class="text-center {{ ($avatarCheck) ? 'hidden' : '' }}">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#mediaModal" onclick="setMediaAvatar(true)">{{ __('chọn ảnh đại diện') }}</a>
                    </div>
                    <div id="remove-avatar" class="{{ ($avatarCheck) ? '333' : 'hidden' }}"><a href="javascript:void(0)">{{ __('xóa ảnh đại diện') }}</a></div>
                    @if ($errors->has('avatar'))
                        <span class="help-block">
                            <small class="text-danger">{{ $errors->first('avatar') }}</small>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#show-hidden-form').click(function() {
        $('.form-add-category').toggle(1000);
    });

    $('#addFoodType').on('click', function(event) {
        var foodTypeName = $('#foodTypeName').val();
        if(foodTypeName == ""){
            $('#foodTypeName').focus();
        } else {
            $.ajax({
                url: '/api/v1/food-type/store',
                type: 'POST',
                data: {
                    'name': foodTypeName
                },
                beforeSend: function(){
                    $('.food-type-error').hide();
                },
                success: function( response ) {
                    if(response.code == 201) {
                        var html = '<label class="custom-checkbox host-checkbox">' + response.data.name +
                                '<input type="checkbox" name="food_type[]" value="' + response.data.id + '" checked>' +
                                '<span class="checkmark"></span>' +
                            '</label>';
                        $('.list-food-type').prepend(html);
                        $('#foodTypeName').val('');
                    } else {
                        $('.food-type-error').show();
                        $('.food-type-error small').html(response.message);
                    }
                }
            });
        }
    });

    tinymce.init({ 
        selector:'#food_recipe',
        height: 120,
        menubar: false,
        toolbar1: 'undo redo'
    });
    tinymce.init({ 
        selector:'#food_note',
        height: 120,
        menubar: false,
        toolbar1: 'undo redo'
    });
</script>

