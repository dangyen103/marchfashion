<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>Danh mục quản lý</h3>
        <ul class="nav side-menu">
            
            @can('user-manager')
                <li><a href="{{ asset('admin/user') }}">
                    <i class="fa fa-users"></i> Người dùng</a>
                </li>
            @endcan
            

            @if(Gate::check('prod-manager') || Gate::check('set-manager') || 
                Gate::check('order-manager') || Gate::check('disc-manager') || 
                Gate::check('confirmOrder') || Gate::check('packingOrder'))
                
                <li><a href="{{ asset('admin/product') }}">
                    <i class="fa fa-cube"></i> Sản phẩm</a>
                </li>
            @endif   

            @can('set-manager')
                <li><a href="{{ asset("admin/set") }}">
                    <i class="fa fa-sort"></i> Set trang phục</span></a>
                </li>
            @endcan

            @if(Gate::check('order-manager') || Gate::check('confirmOrder') || 
                Gate::check('packingOrder') || Gate::check('shippingOrder'))
                <li><a><i class="fa fa-list-alt"></i> Đơn hàng<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                        @can('order-manager')
                            <li><a href="{{ asset("admin/order") }}">Tất cả</a></li>
                        @endcan

                        @if(Gate::check('order-manager') || Gate::check('confirmOrder'))
                            <li><a href="{{ asset("admin/order/confirm") }}">Chờ xác nhận</a></li>
                        @endif

                        @if(Gate::check('order-manager') || Gate::check('packingOrder'))
                            <li><a href="{{ asset("admin/order/packing") }}">Đang đóng gói</a></li>
                        @endif

                        @if(Gate::check('order-manager') || Gate::check('shippingOrder'))
                            <li><a href="{{ asset("admin/order/shipping") }}">Đang vận chuyển</a></li>
                        @endif

                        @can('order-manager')
                            <li><a href="{{ asset("admin/order/completed") }}">Đã giao hàng</a></li>
                        @endcan
                        
                    </ul>
                </li>
            @endif

            @can('disc-manager')
                <li><a href="{{ asset("admin/discount") }}"><i class="fa fa-tag"></i> Khuyến mại</span></a>
                </li>
            @endcan
            
            @can('post-manager')
                <li><a href="{{ asset("admin/post") }}"><i class="fa fa-newspaper-o"></i> Bài đăng</span></a>
                </li>
            @endcan

            @can('adminitrator')
                <li><a href="{{ asset("admin/category") }}"><i class="fa fa-list-ul"></i> Danh mục sản phẩm</span></a>
                </li>
            @endcan

            @can('adminitrator')
                <li><a href="{{ asset("admin/theme-setting") }}"><i class="fa fa-desktop"></i> Giao diện website</span></a>
                </li>
            @endcan
        </ul>
    </div>

</div>