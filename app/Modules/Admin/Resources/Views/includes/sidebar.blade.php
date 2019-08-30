<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">{{ __('thanh điều hướng') }}</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> {{ __('dashboard') }} </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <i class="mdi mdi-account-box"></i>
                        <span> {{ __('người dùng') }} </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.article_samples.index') }}">
                        <i class="mdi mdi-account-box"></i>
                        <span> {{ __('bài viết mẫu') }} </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-account-box"></i>
                        <span> {{ __('món ăn') }}</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.foods.index') }}">Danh sách Món ăn</a></li>
                        <li><a href="{{ route('admin.food-type.index') }}">Loại món ăn</a></li>
                        <li><a href="{{ route('admin.food-type.create') }}">Thêm mới</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
