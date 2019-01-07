@extends('layouts.index')

@section('content')
<div class="container-fluid">

		<div class="prod-banner">
			<img class="img-fluid" src="{{ asset("uploads/theme/$web_theme->about_banner") }}" alt="" width="100%">
		</div>

        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
					<li>
						<span>›</span>Giới thiệu
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
                <!-- Left Sidebar -->
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="{{ asset('gioi-thieu') }}">Giới thiệu</a></li>
						<li><a href="{{ asset('tuyen-dung') }}">Tuyển dụng</a></li>
						<li><a class="active" href="{{ asset('cac-cua-hang') }}">Các cửa hàng</a></li>
						<li><a href="{{ asset('lien-he') }}">Liên hệ</a></li>
					</ul>
                </div>
                <!-- End Left Sidebar -->
                
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Các cửa hàng</h3>
                        </div>
                        
                        <div class="col-12 about-content-area">
                            <p>Hiện nay, March Fashion có 3 cửa hàng đều đặt tại Hà Nội với không gian rộng rãi và có chỗ để xe riêng cho khách hàng:</p>
                            <div>
                                @foreach ($web_shop_addresses as $item)
                                    <p>- {{ $item }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection