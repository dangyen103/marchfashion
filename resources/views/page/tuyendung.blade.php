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
						<span>›</span>Tuyển dụng
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
                <!-- Left Sidebar -->
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="{{ asset('gioi-thieu') }}">Giới thiệu</a></li>
						<li><a class="active" href="{{ asset('tuyen-dung') }}">Tuyển dụng</a></li>
						<li><a href="{{ asset('cac-cua-hang') }}">Các cửa hàng</a></li>
						<li><a href="{{ asset('lien-he') }}">Liên hệ</a></li>
					</ul>
                </div>
                <!-- End Left Sidebar -->
                
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Tuyển dụng</h3>
                        </div>
                        
                        <div class="col-12 about-content-area">
							<p>{!! $web_theme->hire_post !!}</p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection