@extends('User::layouts.default')

@section('title', __('Home'))

@section('content')
    @include('User::includes.banner')

    <div class="container">
        <div class="row">
            @include('User::includes.search-form')
            <div class="content-index">
				<div class="info-app col-md-12">
					<h4 class="title">{{ __('gioi thieu ve nourist') }}</h4>
					<p class="summary-app">{{ __('gioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nouristgioi thieu ve nourist') }}</p>
					<div class="logo-app">
						<img src="{{asset('modules/user/img/logo.png')}}">
					</div>
					<div class="more-info">
						<button class="btn btnApp">{{ __('xem them') }}</button>
					</div>
				</div>
				<div class="suggest-list col-md-12">
					<h4 class="title">{{ __('goi y bua an tot nhat') }}</h4>
					<div class="food-list row">
						<div class="best-food col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('meals.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/meal1.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="name-meal">
                                    <a href="{{route('meals.detail', 0)}}">Phở bò</a>
                                </div>
                                <div class="info-host">
                                    <div class="avatar">
                                        <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                                    </div>
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Gia dinh co tam</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
                                    </div>
                                </div>
                                <div class="des-food">
                                    Thanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinh
                                </div>
                                <div class="info-course">
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-dollar"></i>100000Đ/{{ __('người') }}
                                    </div>
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-clock-o"></i>
                                        12:00PM
                                    </div>
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-user-o"></i>
                                        2 {{ __('người') }}
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
                                        <div class="meal meal-1 active"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="best-food col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('meals.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/meal2.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="name-meal">
                                    <a href="{{route('meals.detail', 0)}}">Thuc don day du mam com</a>
                                </div>
                                <div class="info-host">
                                    <div class="avatar">
                                        <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                                    </div>
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Gia dinh co tam</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
                                    </div>
                                </div>
                                <div class="des-food">
                                    Thanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh phan chinhThanh
                                </div>
                                <div class="info-course">
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-dollar"></i>100000Đ/{{ __('người') }}
                                    </div>
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-clock-o"></i>
                                        12:00PM
                                    </div>
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-user-o"></i>
                                        2 {{ __('người') }}
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
                                        <div class="meal meal-1"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2 active"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3 active"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="best-food col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('meals.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/meal3.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="name-meal">
                                    <a href="{{route('meals.detail', 0)}}">Thuc don com toi đay du 10 mon (Ap dung cho 4 nguoi tro len)</a>
                                </div>
                                <div class="info-host">
                                    <div class="avatar">
                                        <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                                    </div>
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Gia dinh co tam</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
                                    </div>
                                </div>
                                <div class="des-food">
                                    Thanh phan chinhThanh phan chinhThanh phan 
                                </div>
                                <div class="info-course">
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-dollar"></i>100000Đ/{{ __('người') }}
                                    </div>
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-clock-o"></i>
                                        12:00PM
                                    </div>
                                    <div class="col-md-4 p-left-0">
                                        <i class="fa fa-user-o"></i>
                                        4 {{ __('người') }}
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
                                        <div class="meal meal-1"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2 active"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3 active"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					<div class="load-more">
						<a class="more btnMore" href="#">{{ __('xem tat ca') }}(250)</a>
					</div>
					<h4 class="title">{{ __('goi y bua an tot nhat') }}</h4>
					<div class="host-list row">
						<div class="best-host col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('hosts.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/demo/host1.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="info-host">
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Gia dinh co tam</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
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
                                        <div class="meal meal-1"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3 active"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="best-host col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('hosts.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/demo/host2.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="info-host">
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Gia dinh co tam</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
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
                                        <div class="meal meal-1 active"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2 active"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3 active"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="best-host col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('hosts.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/demo/host3.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="info-host">
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Gia dinh co tam</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
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
                                        <div class="meal meal-1"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3 active"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="best-host col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('hosts.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/demo/host4.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="info-host">
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Gia dinh co tam</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
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
                                        <div class="meal meal-1"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2 active"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="best-host col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('hosts.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/demo/host5.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="info-host">
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Bà Tân VLOG</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
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
                                        <div class="meal meal-1 active"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="best-host col-md-4 col-sm-12">
							<div class="image-food col-md-12 col-sm-5">
								<a href="{{route('hosts.detail', 0)}}">
									<img class="" src="{{asset('modules/user/img/demo/host6.png')}}">
								</a>
							</div>
                            <div class="detail col-md-12 col-sm-7">
                                <div class="info-host">
                                    <div class="text">
                                        <div class="name">
                                            <a href="{{route('hosts.detail', 0)}}">Gia dinh co tam</a>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>Ha noi</div>
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
                                        <div class="meal meal-1 active"><img src="{{asset('modules/user/img/morning.png')}}"></div>
                                        <div class="meal meal-2"><img src="{{asset('modules/user/img/lunch.png')}}"></div>
                                        <div class="meal meal-3 active"><img src="{{asset('modules/user/img/night.png')}}"></div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					<div class="load-more">
						<a class="more btnMore" href="#">{{ __('xem tat ca') }}(95)</a>
					</div>
				</div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop
