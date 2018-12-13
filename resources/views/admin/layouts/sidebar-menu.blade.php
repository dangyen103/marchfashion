<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>Danh mục quản lý</h3>
        <ul class="nav side-menu">

            <li><a href="{{ asset('admin/user') }}">
                <i class="fa fa-users"></i> Người dùng</a>
                {{-- <ul class="nav child_menu">
                    <li><a href="#">Danh sách khách hàng</a></li>
                    <li><a href="#">Danh sách quản trị viên</a></li>

                </ul> --}}
            </li>

            <li><a href="{{ asset('admin/product') }}">
                <i class="fa fa-cube"></i> Sản phẩm</a>
            </li>

            <li><a href="{{ asset("admin/set") }}">
                <i class="fa fa-sort"></i> Bộ trang phục</span></a>
            </li>

            <li><a><i class="fa fa-list-alt"></i> Đơn hàng<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ asset("admin/order") }}">Tất cả</a></li>
                    <li><a href="{{ asset("admin/order/confirm") }}">Chờ xác nhận</a></li>
                    <li><a href="{{ asset("admin/order/packing") }}">Đang đóng gói</a></li>
                    <li><a href="{{ asset("admin/order/shipping") }}">Đang vận chuyển</a></li>
                    <li><a href="{{ asset("admin/order/completed") }}">Đã giao hàng</a></li>
                </ul>
            </li>

            <li><a href="{{ asset("admin/discount") }}"><i class="fa fa-tag"></i> Khuyến mại</span></a>
            </li>

            <li><a href="{{ asset("admin/post") }}"><i class="fa fa-newspaper-o"></i> Bài đăng</span></a>
            </li>

            <li><a href="{{ asset("admin/category") }}"><i class="fa fa-list-ul"></i> Danh mục sản phẩm</span></a>
            </li>

        </ul>
    </div>

</div>