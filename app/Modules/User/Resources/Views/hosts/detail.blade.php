@extends('User::layouts.default')
@section('title', __('Home'))

@section('content')

    <link href="{{ asset('modules/user/css/hostdetail.css') }}" rel="stylesheet" type="text/css"/>

    <div class="container host-detail">
        <div class="row">
        	<div class="col-md-4">
        		<div class="content-info">
	        		<div class="avatar-host">
	        			<img src="{{asset('modules/user/img/demo/host5.png')}}">
	        		</div>
	        		<div class="content-verify">
	        			<ul class="verify-1">
		        			<li><i class="fa fa-lg fa-commenting-o"></i>489 reviews</li>
		        			<li><i class="fa fa-lg  fa-shield"></i>Verified</li>
	        			</ul>
	        			<div class="title">Jay provided</div>
	        			<ul class="verify-2">
		        			<li><i class="fa fa-lg  fa-check-circle"></i>Government ID</li>
		        			<li><i class="fa fa-lg  fa-check-circle"></i>Email address</li>
		        			<li><i class="fa fa-lg  fa-check-circle"></i>Phone number</li>
	        			</ul>
	        		</div>
        	</div>
        	</div>
        	<div class="col-md-8 content-text">
        		<div class="description">
        			<h4 class="title">Gia dinh co Tam</h4>
        			<span>Tham gia tu 20/09/2019</span>
        			<div class="text">
        				<p>gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam gio thieu ve gia dinh co tam 
        				</p>
        			</div>
        			<ul class="address">
        				<li><i class="fa fa-lg fa-map-marker"></i><div>Ha noiSinh song tai 789 Hoan Kiem, Ha Noi, Viet Nam
        				</div></li>
        				<li><i class="fa fa-lg fa-comments-o"></i><div>Tieng anh, Tieng Nhat, Tieng Han</div></li>
	        		</ul>
	        	</div>
        		<h4 class="title">Danh sach cac bua an</h4>
        		<div class="food-list row">
        			<div class="best-food col-md-6 col-sm-12">
						<div class="image-food col-md-12 col-sm-5">
							<a href="#">
								<img class="" src="{{asset('modules/user/img/meal1.png')}}">
							</a>
						</div>
                        <div class="detail col-md-12 col-sm-7">
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
        			<div class="best-food col-md-6 col-sm-12">
						<div class="image-food col-md-12 col-sm-5">
							<a href="#">
								<img class="" src="{{asset('modules/user/img/meal2.png')}}">
							</a>
						</div>
                        <div class="detail col-md-12 col-sm-7">
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
        		</div>
        		<div class="rating-all">
        			100 danh gia cua du khach
        			<span>
	                    <i class="fa fa-star"></i>
	                    <i class="fa fa-star"></i>
	                    <i class="fa fa-star"></i>
	                    <i class="fa fa-star"></i>
	                    <i class="fa fa-star"></i>
	                </span>
        		</div>
        		<div class="list-comments">
        			<div class="comment">
        				<div class="info-guest">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                            </div>
                            <div class="text">
                                <div class="name">
                                    <a href="#">Thomas</a>
                                </div>
                                <div class="address">1h ago. Bao cao</div>
                            </div>
                        </div>
                        <div class="des-cmt">
                            danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngdanh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon 
                        </div>
	        		</div>
        			<div class="comment">
        				<div class="info-guest">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                            </div>
                            <div class="text">
                                <div class="name">
                                    <a href="#">Tom</a>
                                </div>
                                <div class="address">1h ago. Bao cao</div>
                            </div>
                        </div>
                        <div class="des-cmt">
                            danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngdanh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon 
                        </div>
	        		</div>
        			<div class="comment">
        				<div class="info-guest">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                            </div>
                            <div class="text">
                                <div class="name">
                                    <a href="#">Thomas</a>
                                </div>
                                <div class="address">1h ago. Bao cao</div>
                            </div>
                        </div>
                        <div class="des-cmt">
                            danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngdanh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon 
                        </div>
	        		</div>
        			<div class="comment">
        				<div class="info-guest">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                            </div>
                            <div class="text">
                                <div class="name">
                                    <a href="#">Tom</a>
                                </div>
                                <div class="address">1h ago. Bao cao</div>
                            </div>
                        </div>
                        <div class="des-cmt">
                            danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngdanh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon 
                        </div>
	        		</div>
        			<div class="comment">
        				<div class="info-guest">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                            </div>
                            <div class="text">
                                <div class="name">
                                    <a href="#">Thor</a>
                                </div>
                                <div class="address">1h ago. Bao cao</div>
                            </div>
                        </div>
                        <div class="des-cmt">
                            danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngdanh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon 
                        </div>
	        		</div>
        			<div class="comment">
        				<div class="info-guest">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('modules/user/image/banner.png')}}">
                            </div>
                            <div class="text">
                                <div class="name">
                                    <a href="#">Thomas</a>
                                </div>
                                <div class="address">1h ago. Bao cao</div>
                            </div>
                        </div>
                        <div class="des-cmt">
                            danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngdanh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon danh gia rat ngon 
                        </div>
	        		</div>
	        		<div class="load-more">
	        			Xem them danh gia
	        		</div>
        		</div>
        		<div class="report">
        			Bao cao ho so nay
        		</div>
        	</div>
        </div>
    </div>
    host detail
@stop

@section('scripts')
@stop
