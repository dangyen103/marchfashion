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
                <!-- Left Sidebar -->
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="#">Thông tin tài khoản</a></li>
						<li><a href="#">Giỏ hàng</a></li>
						<li><a href="#">Đơn hàng của tôi</a></li>
					</ul>
                </div>
                <!-- End Left Sidebar -->
                
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Thông tin tài khoản</h3>
                        </div>
                        
                        <div class="col-12">
                            <div class="row account-info mx-0 px-2">
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Họ tên
                                    </div>
                                    <div class="account-item-value">
                                        Đặng Thị Yến
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Email
                                    </div>
                                    <div class="account-item-value">
                                        dangthiyen103@gmail.com
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Số điện thoại
                                    </div>
                                    <div class="account-item-value">
                                        0985690342
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Ngày sinh
                                    </div>
                                    <div class="account-item-value">
                                        10/03/1996
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Giới tính
                                    </div>
                                    <div class="account-item-value">
                                        Nữ
                                    </div>
                                </div>
                                <div class="col-12 btn-account-info-edit">
                                    <a href="#">Chỉnh sửa</a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection