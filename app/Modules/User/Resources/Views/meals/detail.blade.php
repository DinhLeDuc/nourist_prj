@extends('User::layouts.default')

@section('title', __('Home'))

@section('styles')
    <link href="{{ asset('modules/user/css/meal.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('modules/user/css/grid.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('content')
    {{--slide--}}

    <div class="col-sm-12 p-0">
        <div class="imageData imgs-grid imgs-grid-3">
            <div class="imgs-grid-image">
                <div class="image-wrap"><img
                            src="/modules/user/img/meal1.png"
                            alt="" title=""></div>
            </div>

            <div class="imgs-grid-image">
                <div class="image-wrap"><img
                            src="/modules/user/img/meal2.png"
                            alt="" title=""></div>

            </div>
            <div class="imgs-grid-image">
                <div class="image-wrap"><img
                            src="/modules/user/img/meal3.png"
                            alt="" title=""></div>
            </div>
            <div class="imgs-grid-image">
                <div class="image-wrap"><img
                            src="/modules/user/img/meal4.png"
                            alt="" title=""></div>
            </div>
            <div class="imgs-grid-image">
                <div class="image-wrap"><img
                            src="/modules/user/img/meal1.png"
                            alt="" title=""></div>
            </div>


        </div>
    </div>

    {{--container--}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12 meal-detail">
                <div class="row">
                    <div style="margin-bottom: 50px">
                        <div class="row">
                            {{--description--}}
                            <div class="col-md-8 col-sm-12 meal-description">
                                {{--title--}}
                                <div class="title">
                                    <label>Thực đơn trưa đầy đủ 8 món</label>
                                </div>
                                {{--position--}}
                                <div class="position">
                                    <div class="place">
                                        <img src="/images/icon/placeholder.png">
                                        <span> Hà Nội</span>
                                    </div>

                                    <div class="clock">
                                        <img src="/images/icon/clock.png">
                                        <span> 06:00AM</span>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="clearfix"></div>

                                </div>
                                {{--content--}}
                                <div class="content">
                                    <div class="description-container">
                                        <label class="sub-title">Thông tin về gia đình nấu ăn</label>
                                        <div class="description">
                                            <p>
                                                Xin chào,....ád ádhkajshdkjashdjka
                                                sdashdkjhasdhajkshdajkshdjakshdjkasd
                                                xczxjchzjxchz hkdjahsdkas zhxjkchkas dạh
                                                <span>
                                            Xem thêm
                                        </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="info-container">
                                        <img src="/images/default_user.png" class="avatar">
                                        <p class="name">Gia đình cô tấm</p>
                                    </div>

                                    <div class="divider"></div>
                                    <div class="clearfix"></div>
                                </div>
                                {{--food list--}}
                                <div class="food-list">
                                    <label class="sub-title">Các món ăn bữa trưa</label>
                                    <div class="list">
                                        <div class="food">
                                            <img src="/images/default.png">
                                            <p>Thịt gà</p>
                                        </div>
                                        <div class="food">
                                            <img src="/images/default.png">
                                            <p>Thịt gà</p>
                                        </div>
                                        <div class="food">
                                            <img src="/images/default.png">
                                            <p>Thịt gà</p>
                                        </div>
                                        <div class="food">
                                            <img src="/images/default.png">
                                            <p>Thịt gà</p>
                                        </div>
                                        <div class="food">
                                            <img src="/images/default.png">
                                            <p>Thịt gà</p>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="clearfix"></div>
                                </div>
                                {{--utility--}}
                                <div class="utilities">
                                    <label class="sub-title">Tiện nghi</label>
                                    <div class="util-list">
                                        <div class="util">
                                            <img src="/images/icon/clock.png">
                                            <span class="">có chỗ để xe </span>
                                        </div>

                                        <div class="util">
                                            <img src="/images/icon/clock.png">
                                            <span class="">có chỗ để xe </span>
                                        </div>
                                        <div class="util">
                                            <img src="/images/icon/clock.png">
                                            <span class="">có chỗ để xe </span>
                                        </div>
                                        <div class="util">
                                            <img src="/images/icon/clock.png">
                                            <span class="">có chỗ để xe </span>
                                        </div>
                                        <div class="util">
                                            <img src="/images/icon/clock.png">
                                            <span class="">có chỗ để xe </span>
                                        </div>

                                    </div>
                                    <div class="divider"></div>
                                    <div class="clearfix"></div>
                                </div>
                                {{--image --}}
                                <div class="pic-travel">
                                    <label class="sub-title">Ảnh du khác chụp</label>
                                    <div class="pic-list">
                                        <img class="pic" src="/images/default.png">
                                        <img class="pic" src="/images/default.png">
                                        <img class="pic" src="/images/default.png">
                                        <img class="pic" src="/images/default.png">
                                    </div>
                                    <p class="show-all">
                                        Xem tất cả
                                    </p>
                                    <div class="divider"></div>
                                    <div class="clearfix"></div>
                                </div>
                                {{--review--}}
                                <div class="reviews">
                                    <div class="review-count">
                                        <span>100 đánh giá của du khách</span>
                                        <ul class="star-list">
                                            <li>&#9734;</li>
                                            <li>&#9734;</li>
                                            <li>&#9734;</li>
                                            <li>&#9734;</li>
                                            <li>&#9734;</li>
                                        </ul>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="review-detail">
                                        <div class="review-list">
                                            {{--review--}}
                                            <div class="review">
                                                <div class="user">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="user-info">
                                                        <p class="nickname">Nam</p>
                                                        <p class="hour-review">
                                                            11h ago
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p>
                                                        asdasdaskjdasjdkaldjaslkdas...<span>Xem thêm</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review">
                                                <div class="user">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="user-info">
                                                        <p class="nickname">Nam</p>
                                                        <p class="hour-review">
                                                            11h ago
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p>
                                                        asdasdaskjdasjdkaldjaslkdas...<span>Xem thêm</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review">
                                                <div class="user">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="user-info">
                                                        <p class="nickname">Nam</p>
                                                        <p class="hour-review">
                                                            11h ago
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p>
                                                        asdasdaskjdasjdkaldjaslkdas...<span>Xem thêm</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review">
                                                <div class="user">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="user-info">
                                                        <p class="nickname">Nam</p>
                                                        <p class="hour-review">
                                                            11h ago
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p>
                                                        asdasdaskjdasjdkaldjaslkdas...<span>Xem thêm</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review">
                                                <div class="user">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="user-info">
                                                        <p class="nickname">Nam</p>
                                                        <p class="hour-review">
                                                            11h ago
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p>
                                                        asdasdaskjdasjdkaldjaslkdas...<span>Xem thêm</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review">
                                                <div class="user">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="user-info">
                                                        <p class="nickname">Nam</p>
                                                        <p class="hour-review">
                                                            11h ago
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p>
                                                        asdasdaskjdasjdkaldjaslkdas...<span>Xem thêm</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-page">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item"><a href="#" class="page-link"
                                                                         aria-label="Previous"><span aria-hidden="true">«</span><span
                                                                class="sr-only">Previous</span></a></li>
                                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link" aria-label="Next">
                                                        <span aria-hidden="true">»</span><span
                                                                class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            {{--price--}}
                            <div class="col-md-4 col-sm-12 meal-price">
                                <div class="container">
                                    {{--price--}}
                                    <div class="price">
                                        <p>$3 / Người</p>
                                    </div>
                                    {{--rate--}}
                                    <div class="rate">
                                        <ul class="star-list">
                                            <li>&#9734;</li>
                                            <li>&#9734;</li>
                                            <li>&#9734;</li>
                                            <li>&#9734;</li>
                                            <li>&#9734;</li>
                                        </ul>
                                        <span>(100)</span>
                                    </div>

                                    {{--form--}}
                                    <form class="form">
                                        {{--time--}}
                                        <div class="time">
                                            <label>
                                                Thời gian
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control" readonly data-date-format="mm/dd/yyyy">
                                                <span style="position: absolute;right: 10px;margin: auto;display: block;top: 50%;transform: translate(0, -50%);"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                        {{--guest--}}
                                        <div class="guest">
                                            <div>
                                                <label>
                                                    Khách
                                                </label>
                                                <div class="dropdown">
                                                    <div class=" dropdown-toggle" data-toggle="dropdown" style="background: transparent;">
                                                        1 Người lớn 1 trẻ em
                                                        <span class="caret"></span>
                                                    </div>
                                                    <div class="dropdown-menu" aria-labelledby="gestSelect">
                                                        <div class="onerow">
                                                            <div class="left-text">Người lớn</div>
                                                            <div class="right-control adults">
                                                                <span class="minus pointer"><i class="fa fa-minus"></i></span>
                                                                <span class="result" result="2" min="1">2</span>
                                                                <span class="plus pointer"><i class="fa fa-plus"></i></span>
                                                                <input type="hidden" name="noofadult" value="2">
                                                            </div>
                                                        </div>
                                                        <div class="onerow">
                                                            <div class="left-text">Trẻ em<br>(2-11 tuổi)</div>
                                                            <div class="right-control childrent">
                                                                <span class="minus pointer"><i class="fa fa-minus"></i></span>
                                                                <span class="result" result="0" min="0">0</span>
                                                                <span class="plus pointer"><i class="fa fa-plus"></i></span>
                                                                <input type="hidden" name="noofchildren" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{--submit--}}
                                        <div class="submit"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--suggest--}}
                    <div class="col-md-12 col-sm-12 meal-suggests">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="sub-title">Thưởng thức nhiều bữa hơn</label>
                            </div>
                            <div>
                                <div class="suggest-list">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 p-0">
                                            <div class="suggest">
                                                <img src="/images/default.png" class="picture">
                                                <div class="title">
                                                    <p>Thực đơn mâm trưa đầy đủ</p>
                                                </div>
                                                <div class="info">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="content">
                                                        <p class="nickname">Gia đình cô tấm</p>
                                                        <div class="place">
                                                            <img src="/images/icon/placeholder.png">
                                                            <span class="title">Hà Nội</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="description">
                                                    ádlkasjdlkasd ádaksdhjakda sdjasdhajsd zxjckljzxc ádlkhasd
                                                    zxckljzxlczx
                                                    ckjasdlkasd
                                                </div>
                                                <div class="sub">
                                                    <ul class="container">
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>10/người</span>
                                                        </li>
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>06:00AM</span>
                                                        </li>
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>2 người</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="reviews">
                                                    <div class="rate">
                                                        <ul class="star-list">
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                        </ul>
                                                        <span>(100)</span>
                                                    </div>
                                                    <div class="meal">

                                                        <div class="morning">
                                                            <img src="/modules/user/img/morning.png">
                                                        </div>


                                                        <div class="lunch">
                                                            <img src="/modules/user/img/lunch.png">
                                                        </div>

                                                        <div class="night">
                                                            <img src="/modules/user/img/night.png">
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 p-0">
                                            <div class="suggest">
                                                <img src="/images/default.png" class="picture">
                                                <div class="title">
                                                    <p>Thực đơn mâm trưa đầy đủ</p>
                                                </div>
                                                <div class="info">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="content">
                                                        <p class="nickname">Gia đình cô tấm</p>
                                                        <div class="place">
                                                            <img src="/images/icon/placeholder.png">
                                                            <span class="title">Hà Nội</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="description">
                                                    ádlkasjdlkasd ádaksdhjakda sdjasdhajsd zxjckljzxc ádlkhasd
                                                    zxckljzxlczx
                                                    ckjasdlkasd
                                                </div>
                                                <div class="sub">
                                                    <ul class="container">
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>10/người</span>
                                                        </li>
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>06:00AM</span>
                                                        </li>
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>2 người</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="reviews">
                                                    <div class="rate">
                                                        <ul class="star-list">
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                        </ul>
                                                        <span>(100)</span>
                                                    </div>
                                                    <div class="meal">

                                                        <div class="morning">
                                                            <img src="/modules/user/img/morning.png">
                                                        </div>

                                                        <div class="lunch">
                                                            <img src="/modules/user/img/lunch.png">
                                                        </div>

                                                        <div class="night">
                                                            <img src="/modules/user/img/night.png">
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 p-0">
                                            <div class="suggest">
                                                <img src="/images/default.png" class="picture">
                                                <div class="title">
                                                    <p>Thực đơn mâm trưa đầy đủ</p>
                                                </div>
                                                <div class="info">
                                                    <div class="avatar">
                                                        <img src="/images/default_user.png">
                                                    </div>
                                                    <div class="content">
                                                        <p class="nickname">Gia đình cô tấm</p>
                                                        <div class="place">
                                                            <img src="/images/icon/placeholder.png">
                                                            <span class="title">Hà Nội</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="description">
                                                    ádlkasjdlkasd ádaksdhjakda sdjasdhajsd zxjckljzxc ádlkhasd
                                                    zxckljzxlczx
                                                    ckjasdlkasd
                                                </div>
                                                <div class="sub">
                                                    <ul class="container">
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>10/người</span>
                                                        </li>
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>06:00AM</span>
                                                        </li>
                                                        <li class="price">
                                                            <img src="/images/icon/clock.png">
                                                            <span>2 người</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="reviews">
                                                    <div class="rate">
                                                        <ul class="star-list">
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                            <li>&#9734;</li>
                                                        </ul>
                                                        <span>(100)</span>
                                                    </div>
                                                    <div class="meal">

                                                        <div class="morning">
                                                            <img src="/modules/user/img/morning.png">
                                                        </div>

                                                        <div class="lunch">
                                                            <img src="/modules/user/img/lunch.png">
                                                        </div>

                                                        <div class="night">
                                                            <img src="/modules/user/img/night.png">
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@stop


@section('scripts')
@stop
