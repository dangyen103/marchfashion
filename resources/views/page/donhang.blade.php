@extends('layouts.index')

@section('content')
<div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route("trangchu") }}">Trang chủ</a></li>
					<li>
						<span>›</span>Đơn hàng của tôi
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="{{ asset("tai-khoan") }}">Thông tin tài khoản</a></li>
						<li><a href="{{ asset("gio-hang") }}">Giỏ hàng</a></li>
						<li><a class="active" href="{{ asset("don-hang") }}">Đơn hàng của tôi</a></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Đơn hàng của tôi</h3>
                        </div>
                        <!-- Order is empty -->
                        <!-- <div class="col-12 empty-order txt-center ">
                            <h6 class="cl-gray-2 txt-s1">Bạn chưa có đơn hàng nào.</h6>
                            <img src="imgs/empty-cart.png" alt="empty-cart" width="100px">
                        </div> -->

                        <!-- Cart is not empty -->
                        <div class="col-12 order-list-area">
                            <div class="order-count-notice mb-3">
                                Bạn có 3 đơn hàng.
                            </div>
                            <!-- Order List Row -->
                            <div class="row mx-0 order-list-row mb-4">
                                <div class="col-12">
                                    <div class="order-info-block">
                                        <div class="order-info-block-l">
                                            <div class="order-info-block-name">
                                                Đơn hàng <a href="#">#123244121</a>
                                            </div>
                                            <div class="order-info-block-time">
                                                Đặt ngày 27-10-2018 11:02
                                            </div>
                                        </div>
                                        <div class="order-item-status">
                                            <span>Đang giao hàng</span>
                                        </div>
                                        <div class="order-info-block-r">
                                            <a href="#">Chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="order-items-block">
                                        <div class="row order-item-block">
                                            <div class="col-sm-5 order-item-prod">
                                                <img class="order-item-img" src="uploads/products/4hgpz-V03.jpg" alt="hình ảnh">
                                                <div class="order-item-name">
                                                    Váy nơ tay lửng cổ tròn thiết kế mới 2018
                                                    <div class="order-item-price-xs">
                                                        <span class="cl-red">180000₫</span>
                                                    </div>
                                                    <div class="order-item-num-xs">
                                                        <span>x</span> 1
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 order-item-price">
                                                    <span class="cl-red">180000₫</span>
                                                </div>
                                            <div class="col-sm-4 order-item-num">
                                                <span>x</span> 1
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mx-0 order-list-row mb-4">
                                <div class="col-12">
                                    <div class="order-info-block">
                                        <div class="order-info-block-l">
                                            <div class="order-info-block-name">
                                                Đơn hàng <a href="#">#123244121</a>
                                            </div>
                                            <div class="order-info-block-time">
                                                Đặt ngày 27-10-2018 11:02
                                            </div>
                                        </div>
                                        <div class="order-item-status">
                                            <span>Đang giao hàng</span>
                                        </div>
                                        <div class="order-info-block-r">
                                            <a href="#">Chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="order-items-block">
                                        <div class="row order-item-block">
                                            <div class="col-sm-5 order-item-prod">
                                                <img class="order-item-img" src="uploads/products/4hgpz-V03.jpg" alt="hình ảnh">
                                                <div class="order-item-name">
                                                    Váy nơ tay lửng cổ tròn thiết kế mới 2018
                                                    <div class="order-item-price-xs">
                                                        <span class="cl-red">180000₫</span>
                                                    </div>
                                                    <div class="order-item-num-xs">
                                                        <span>x</span> 1
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 order-item-price">
                                                    <span class="cl-red">180000₫</span>
                                                </div>
                                            <div class="col-sm-4 order-item-num">
                                                <span>x</span> 1
                                            </div>
                                        </div>
                                        <div class="row order-item-block">
                                            <div class="col-sm-5 order-item-prod">
                                                <img class="order-item-img" src="uploads/products/4hgpz-V03.jpg" alt="hình ảnh">
                                                <div class="order-item-name">
                                                    Váy nơ tay lửng cổ tròn thiết kế mới 2018
                                                    <div class="order-item-price-xs">
                                                        <span class="cl-red">180000₫</span>
                                                    </div>
                                                    <div class="order-item-num-xs">
                                                        <span>x</span> 1
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 order-item-price">
                                                    <span class="cl-red">180000₫</span>
                                                </div>
                                            <div class="col-sm-4 order-item-num">
                                                <span>x</span> 1
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Order List Row -->
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection