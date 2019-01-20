@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
					<li>
						<span>›</span>Thông tin tài khoản
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
                <!-- Left Sidebar -->
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a class="active"href="{{ asset("tai-khoan") }}">Thông tin tài khoản</a></li>
						<li><a href="{{ asset("gio-hang") }}">Giỏ hàng</a></li>
						<li><a href="{{ asset("don-hang") }}">Đơn hàng của tôi</a></li>
					</ul>
                </div>
                <!-- End Left Sidebar -->
                
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Thông tin tài khoản</h3>
                        </div>
                        
                        <div class="col-12">
                            <div class="row account-info mx-0 pb-0 px-2">
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Họ tên
                                    </div>
                                    <div class="account-item-value">
                                        {{ Auth::user()->name }}
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Email
                                    </div>
                                    <div class="account-item-value">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Số điện thoại
                                    </div>
                                    <div class="account-item-value">
                                        {{ Auth::user()->customer->phone }}
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Ngày sinh
                                    </div>
                                    <div class="account-item-value">
                                        {{ date('d/m/Y', strtotime(Auth::user()->customer->birthday)) }}
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Giới tính
                                    </div>
                                    <div class="account-item-value">
                                        @if (Auth::user()->customer->gender == 0)
                                            Nữ
                                        @else
                                            Nam
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row account-info mx-0 pt-0 px-2">
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Tỉnh/Thành phố
                                    </div>
                                    <div class="account-item-value">
                                        {{ Auth::user()->customer->city }}
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Quận/Huyện
                                    </div>
                                    <div class="account-item-value">
                                        {{ Auth::user()->customer->district }}
                                    </div>
                                </div>
                                <div class="col-sm-4 account-item mb-30">
                                    <div class="account-item-label">
                                        Địa chỉ
                                    </div>
                                    <div class="account-item-value">
                                        {{ Auth::user()->customer->address }}
                                    </div>
                                </div>

                                <div class="col-12 btn-account-info-edit">
                                    <a href="{{ asset("tai-khoan/chinh-sua") }}">Chỉnh sửa</a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection