@extends('User::layouts.default')

@section('title', __('Search'))

@section('styles')
    <link href="{{ asset('modules/user/css/bootstrap-slider.min.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('content')
    @include('User::includes.banner')

    <div class="container">
        <div class="row">
            @include('User::includes.search-form')

            <div class="content-search col-md-12">
                <div class="row">

                    <div class="tab-filter col-md-4">
                        <form class="filter-form">
                        <div class="map-div">
                            <img class="img-map" src="{{asset('modules/user/image/banner.png')}}">
                            <button class="btn-map">{{ __('xem bản đồ') }}</button>
                        </div>
                        <div class="filter-best">
                            <div class="title">
                                <div class="text-label">{{ __('sắp xếp kết quả') }}</div>
                                <div class="text-label-1">{{ __('sắp xếp kết quả tìm kiếm theo') }}:</div>
                            </div>
                            <div class="line-clear"></div>
                            <div class="item-sort">
                                <div class="item width-50 custom-radio">
                                    <input class="q" value="{{ FOOT_SORT_TYPE_MAX_PRICE  }}" type="radio" name="sort_type" id="sort_type_1">
                                    <label for="sort_type_1">{{ __('giá cao nhất') }}</label>
                                </div>
                                <div class="item width-50 custom-radio">
                                    <input class="q" value="{{ FOOT_SORT_TYPE_MIN_PRICE  }}" type="radio" name="sort_type" id="sort_type_2">
                                    <label for="sort_type_2">{{ __('giá thấp nhất') }}</label>
                                </div>
                                <div class="item width-50 custom-radio">
                                    <input class="q" value="{{ FOOT_SORT_TYPE_MAX_REVIEW }}" type="radio" name="sort_type" id="sort_type_3">
                                    <label for="sort_type_3">{{ __('điểm đánh giá') }}</label>
                                </div>
                                <div class="item width-50 custom-radio">
                                    <input class="q" value="{{ FOOT_SORT_TYPE_MIN_REVIEW  }}" type="radio" name="sort_type" id="sort_type_4">
                                    <label for="sort_type_4">{{ __('phổ biến nhất') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-detail">
                            <div class="title">
                                <div class="text-label">{{ __('kết quả lọc') }}</div>
                                <div class="text-label-1">{{ __('hiển thị kết quả dựa trên danh mục') }}:</div>
                            </div>
                            <div class="line-clear"></div>
                            <div class="item-filter">
                                <div class="title active">
                                    {{ __('giá mỗi bữa ăn') }}

                                    <i class="fa fa-angle-down" data-toggle="collapse" data-target="#collPrice" aria-expanded="false" aria-controls="collPrice"></i>
                                </div>
                                <div id="collPrice" class="collapse">
                                <div class="price" >
                                    <div class="start-money">
                                        1,000 VNĐ
                                    </div>
                                    <div class="end-money">
                                        5,000,000 VNĐ
                                    </div>
                                </div>
                                <div class="slider-wrapper m-t-20  q-slide" style="width: 90%; margin: 30px auto;">
                                    <input name="prices" class="input-range" data-slider-id='ex12cSlider' type="hidden" data-slider-step="1" data-slider-value="1000, 5000000" data-slider-min="0" data-slider-max="10000000" data-slider-range="true" data-slider-tooltip_split="true" />
                                </div>
                                </div>
                            </div>
                            <div class="line-clear"></div>
                            <div class="item-filter">
                                <div class="title active">{{ __('đánh giá sao') }}<i class="fa fa-angle-down"  data-toggle="collapse" data-target="#collRating" aria-expanded="false" aria-controls="collRating"></i></div>
                                <div class="rating collapse" id="collRating">
                                    <label class="custom-checkbox">
                                        <i class="fa fa-star"></i>
                                        <input type="checkbox" name="search_rating_num[]" class="q" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <input type="checkbox" name="search_rating_num[]" class="q" value="2">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <input type="checkbox" name="search_rating_num[]" class="q" value="3">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <input type="checkbox" name="search_rating_num[]" class="q" value="4">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <input type="checkbox" name="search_rating_num[]" class="q" value="5">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="line-clear"></div>
                            <div class="item-filter">
                                <div class="title active">
                                    {{ __('kết quả theo bữa ăn') }}
                                    <i class="fa fa-angle-down"  data-toggle="collapse" data-target="#collMeal" aria-expanded="false" aria-controls="collMeal"></i>
                                </div>
                                <div class="type collapse" id="collMeal">
                                    <label class="custom-checkbox">
                                        {{ __('bữa sáng') }}
                                        <input type="checkbox" name="type_meals[]" value="{{TYPE_MEAL_BREAKFAST}}" class="q">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-checkbox">
                                        {{ __('bữa trưa') }}
                                        <input type="checkbox"  name="type_meals[]" value="{{TYPE_MEAL_LUNCH}}"  class="q">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-checkbox">
                                        {{ __('bữa tối') }}
                                        <input type="checkbox"  name="type_meals[]" value="{{TYPE_MEAL_DINNER}}"  class="q">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="tab-result col-md-8 p-right-0">
                        <div class="tilte-result">
                            <div class="title">
                                <div class="text-label">Kết quả tìm kiếm bữa ăn trưa tại <span style="font-weight: bold; color: red">{{$position? $position : __('tất cả')}}</span></div>
                                {{--<div class="text-label-1"> Ngày: {{$time_eat}}</div>--}}
                            </div>
                        </div>
                        <div class="list-result" id="searchResult">


                            @foreach ($foods as $key => $food)

                                <div class="item-result">
                                    <div class="img-result col-md-4 p-left-0">

                                        <a href="{{ route('meals.detail', $food->id) }}">

                                            <img class="img-food" src="{{asset($food->avatar)}}">
                                        </a>
                                    </div>

                                    <div class="detail col-md-8">
                                        <div class="name-meal">
                                            <a href="{{ route('meals.detail', $food->id) }}">{{ $food->name }}</a>
                                        </div>
                                        <div class="info-host">
                                            <div class="avatar">
                                                <img class="img-avatar" src="{{asset($food->user->avatar)}}">
                                            </div>
                                            <div class="text">
                                                <div class="name">
                                                    <a href="{{ route('hosts.detail', $food->user_id) }}">{{ $food->user->host->brand_name }}</a>
                                                </div>
                                                <div class="address"><i class="fa fa-map-marker"></i>{{ $food->user->host->city }}</div>
                                            </div>
                                        </div>
                                        <div class="des-food">
                                            {!! $food->introduction !!}
                                        </div>
                                        <div class="info-course">
                                            <div class="col-md-4 p-left-0">
                                                <i class="fa fa-dollar"></i> {{ number_format($food->price) }}VND/nguoi
                                            </div>
                                            <div class="col-md-4 p-left-0">
                                                <i class="fa fa-clock-o"></i>
                                                12:00PM
                                            </div>
                                            <div class="col-md-4 p-left-0">
                                                <i class="fa fa-user-o"></i>
                                                2 nguoi
                                            </div>
                                        </div>
                                        <div class="rate-type">
                                            <div class="rate col-md-6 p-left-0">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                (100)
                                            </div>
                                            <div class="type col-md-6 p-right-0">
                                                <div class="meal"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                                <div class="meal"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                                <div class="meal"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('modules/user/js/bootstrap-slider.min.js') }}"></script>
    <script>
        var startMoney = 1000,
            endMoney = 5000000;
        $( document ).ready( function() {
            $( '.input-range').each(function() {
                var value = $(this).attr('data-slider-value');
                var separator = value.indexOf(',');
                if( separator !== -1 ){
                    value = value.split(',');
                    value.forEach(function(item, i, arr) {
                        arr[ i ] = parseFloat( item );
                    });
                } else {
                    value = parseFloat( value );
                }
                $( this ).slider({
                    formatter: function(value) {
                        if(value < startMoney || value < endMoney) {
                            startMoney = value;
                        } else {
                            endMoney = value;
                        }
                        $('.start-money').html(formatNumber(startMoney) + ' VNĐ');
                        $('.end-money').html(formatNumber(endMoney) + ' VNĐ');
                        return formatNumber(value) + ' vnđ';
                    },
                    min: parseFloat( $( this ).attr('data-slider-min') ),
                    max: parseFloat( $( this ).attr('data-slider-max') ),
                    range: $( this ).attr('data-slider-range'),
                    value: value,
                    tooltip_split: $( this ).attr('data-slider-tooltip_split'),
                    tooltip: $( this ).attr('data-slider-tooltip')
                });
            });

            // $('#search_position').keyup(function(){ 
            //     var query = $(this).val();
            //     if(query != '') {
            //         $.ajax({
            //             url:"api/v1/city/autocomplete",
            //             method:"GET",
            //             data:{
            //                 name:$('#search_position').val()
            //             },
            //             success:function(data){
            //                 $('#countryList').fadeIn();  
            //                 $('#countryList').html(data);
            //             }
            //         });
            //     }
            // });
        });
    </script>
@stop
