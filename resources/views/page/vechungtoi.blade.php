@extends('layouts.index')

@section('content')
<div class="container-fluid">

		<div class="prod-banner">
			<img class="img-fluid" src="imgs/About_Banner.jpg" alt="" width="100%">
		</div>

        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="#">Trang chủ</a></li>
					<li>
						<span>›</span>Giới thiệu
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
                <!-- Left Sidebar -->
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="#">Giới thiệu</a></li>
						<li><a href="#">Tuyển dụng</a></li>
						<li><a href="#">Các cửa hàng</a></li>
						<li><a href="#">Liên hệ</a></li>
					</ul>
                </div>
                <!-- End Left Sidebar -->
                
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Giới thiệu</h3>
                        </div>
                        
                        <div class="col-12 about-content-area">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection