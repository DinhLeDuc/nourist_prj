@extends('User::layouts.ajax')

@section('content')
    @if(count($foods) == 0)
        <div style="text-align: center">
            <p style="color: #8e8e8e;"> {{__('không có kết quả nào phù hợp')}} </p>
        </div>
    @else
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
    @endif
@stop

