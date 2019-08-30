<div id="host-sidebar">
    <ul>
        <li><a href=""><i class="fa fa-bell" aria-hidden="true"></i> {{ __('thông báo của tôi') }}</a></li>
        
        <li><a href=""><i class="fa fa-cart-plus" aria-hidden="true"></i> {{ __('quản lý đơn hàng') }}</a></li>
        @if (Auth::user()->group_id == 2)
            <li class="active"><a href="{{ route('foods.index') }}"><i class="fa fa-cutlery" aria-hidden="true"></i> {{ __('quản lý món ăn') }}</a></li>
            <li><a href="{{ route('meals.index') }}"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> {{ __('quản lý bữa ăn') }}</a></li>
        @endif
    </ul>
</div>