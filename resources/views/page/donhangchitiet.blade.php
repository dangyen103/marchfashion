@extends('layouts.index')

@section('content')
<div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="#">Trang chủ</a></li>
					<li>
						<span>›</span>Đơn hàng của tôi
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="#">Thông tin tài khoản</a></li>
						<li><a href="#">Giỏ hàng</a></li>
						<li><a href="#">Đơn hàng của tôi</a></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Chi tiết đơn hàng</h3>
                        </div>
                        
                        <div class="col-12 order-list-area mb-30">
                            <div class="row mx-0 order-list-row">
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
                                        <div class="order-info-block-r">
                                            <span class="pr-2">Tổng cộng:</span>
                                            <strong class="cl-red txt-total">560000₫</strong>
                                        </div>
                                    </div>

                                    <!-- Order Status Progress -->
                                    <div class="order-status-progress my-5">
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 66.6666667%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="row mx-0">
                                            <div class="col-3">
                                                <div class="order-status-node">
                                                    <div class="order-status-node-dot"></div>
                                                    <div class="order-status-node-name">Chờ xác nhận</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="order-status-node">
                                                    <div class="order-status-node-dot"></div>
                                                    <div class="order-status-node-name">Đang đóng gói</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="order-status-node">
                                                    <div class="order-status-node-dot"></div>
                                                    <div class="order-status-node-name">Đang vận chuyển</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="order-status-node">
                                                    <div class="order-status-node-dot"></div>
                                                    <div class="order-status-node-name">Đã giao hàng</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Order Status Progress -->

                                    <div class="order-items-block">
                                        <div class="row order-item-block">
                                            <div class="col-sm-7 col-md-6 col-lg-5 order-item-prod">
                                                <img class="order-item-img" src="uploads/products/4hgpz-V03.jpg" alt="hình ảnh">
                                                <div class="order-item-name">
                                                    Váy nơ tay lửng cổ tròn thiết kế mới 2018
                                                    <div class="order-item-price-xs">
                                                        <span>180000₫</span>
                                                    </div>
                                                    <div class="order-item-num-xs">
                                                        <span>x</span> 1
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 order-item-price">
                                                    <span>180000₫</span>
                                                </div>
                                            <div class="col-sm-2 col-md-3 col-lg-4 order-item-num">
                                                <span>x</span> 1
                                            </div>
                                        </div>
                                        <div class="row order-item-block">
                                            <div class="col-sm-7 col-md-6 col-lg-5 order-item-prod">
                                                <img class="order-item-img" src="uploads/products/4hgpz-V03.jpg" alt="hình ảnh">
                                                <div class="order-item-name">
                                                    Váy nơ tay lửng cổ tròn thiết kế mới 2018
                                                    <div class="order-item-price-xs">
                                                        <span>180000₫</span>
                                                    </div>
                                                    <div class="order-item-num-xs">
                                                        <span>x</span> 1
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 order-item-price">
                                                    <span>180000₫</span>
                                                </div>
                                            <div class="col-sm-2 col-md-3 col-lg-4 order-item-num">
                                                <span>x</span> 1
                                            </div>
                                        </div>
                                        <div class="row order-item-block">
                                            <div class="col-sm-7 col-md-6 col-lg-5 order-item-prod">
                                                <img class="order-item-img" src="uploads/products/4hgpz-V03.jpg" alt="hình ảnh">
                                                <div class="order-item-name">
                                                    Váy nơ tay lửng cổ tròn thiết kế mới 2018
                                                    <div class="order-item-price-xs">
                                                        <span>180000₫</span>
                                                    </div>
                                                    <div class="order-item-num-xs">
                                                        <span>x</span> 1
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 order-item-price">
                                                    <span>180000₫</span>
                                                </div>
                                            <div class="col-sm-2 col-md-3 col-lg-4 order-item-num">
                                                <span>x</span> 1
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 order-detail-area">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="order-detail-block">
                                        <div class="order-detail-block-title">
                                            Thông tin người nhận
                                        </div>
                                        <div class="order-detail-block-list">
                                            <div class="order-detail-block-item">
                                                Đặng Thị Yến
                                            </div>
                                            <div class="order-detail-block-item">
                                                Xóm 2 Bắc, xã Kim Nỗ, Đông Anh, Hà Nội, Hà Nội, Huyện Đông Anh, Xã Kim Nỗ
                                            </div>
                                            <div class="order-detail-block-item">
                                                0985690342
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="order-detail-block">
                                        <div class="order-detail-block-title">
                                            Tổng cộng
                                        </div>
                                        <div class="order-detail-block-total">
                                            <div class="block-total-item">
                                                <div class="block-total-label">Tạm tính</div>
                                                <div class="block-total-value">540000₫</div>
                                            </div>
                                            <div class="block-total-item">
                                                <div class="block-total-label">Phí vận chuyện</div>
                                                <div class="block-total-value">20000₫</div>
                                            </div>
                                            <div class="block-total-item">
                                                <div class="block-total-label">Tổng</div>
                                                <div class="block-total-value">560000₫</div>
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
@endsection