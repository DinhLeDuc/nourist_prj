<header class="header" style="position: fixed; width: 100%; top: 0; z-index: 9999; border-bottom: 1px solid #ededed; z-index: 99;">
    <nav class="navbar navbar-expand-lg" id="nav-menu">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img height="40px" src="{{asset('modules/user/img/logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Host a foods</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Host an experience</a>
                    </li>

                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('đăng ký') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('đăng nhập') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset(Auth::user()->avatar) }}" class="rounded-circle z-depth-0" height="35px">
                                {{ Auth::user()->username }} 
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownXL">
                                <a class="dropdown-item" href="#">{{ __('tài khoản') }}</a>
                                <a class="dropdown-item" href="#">{{ __('thông tin hộ gia đình') }}</a>
                                @if (Auth::user()->group_id == 2)
                                    <a class="dropdown-item"  href="{{ route('meals.index') }}">{{ __('quản lý bữa ăn') }}</a>
                                    <a class="dropdown-item"  href="{{ route('foods.index') }}">{{ __('quản lý món ăn') }}</a>
                                    <a class="dropdown-item"  href="#">{{ __('quản lý đơn hàng') }}</a>
                                @endif
                              
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('đăng xuất') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
