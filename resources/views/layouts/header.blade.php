    <header id="header">
		<!-- Header Banner -->
		<nav class="navbar navbar-expand-lg navbar-black bg-black">
			<div class="container-fluid mx-lg-5">
				<a class="navbar-brand" href="{{ route('trangchu') }}"><img src="{{ asset('uploads/icons/Logo.png') }}"></a>
				<div class="header-left-group-mobile">
					<a class="nav-link cart-noti-mobile" title="Giỏ hàng" data-count="4" href="{{ asset("gio-hang") }}">
						<img class="" src="{{ asset('uploads/icons/cart-icon.png') }}"  alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-bars cl-white"></i>
					</button>
				</div>
	
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto header-menu">
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('trangchu') }}">Trang chủ</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="" id="navbarDropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Sản phẩm
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ asset('san-pham') }}">Tất cả</a>
								<a class="dropdown-item" href="{{ asset('ao') }}">Áo</a>
								<a class="dropdown-item" href="{{ asset('quan') }}">Quần</a>
								<a class="dropdown-item" href="{{ asset('vay') }}">Váy</a>
								<a class="dropdown-item" href="{{ asset('bo') }}">Bộ</a>
								<a class="dropdown-item" href="{{ asset('phu-kien') }}">Phụ kiện</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ asset('xu-huong') }}">Xu hướng</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown02" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Về chúng tôi
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ asset('gioi-thieu') }}">Giới thiệu</a>
								<a class="dropdown-item" href="{{ asset('tuyen-dung') }}">Tuyển dụng</a>
								<a class="dropdown-item" href="{{ asset('cac-cua-hang') }}">Các cửa hàng</a>
								<a class="dropdown-item" href="{{ asset('lien-he') }}">Liên hệ</a>
							</div>
						</li>
						<li class="nav-item dropdown account-setting-mobile">
								<a class="nav-link dropdown-toggle" id="navbarDropdown02" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Tài khoản
								</a>
								@if (Auth::guest())
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ asset('login') }}">Đăng nhập</a>
										<a class="dropdown-item" href="{{ asset('signin') }}">Đăng kí</a>
									</div>
								@else
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ asset("tai-khoan") }}">Thông tin tài khoản</a>
										<a class="dropdown-item" href="{{ asset("don-hang") }}">Đơn hàng của tôi</a>
										<a class="dropdown-item" href="{{ asset('logout') }}">Đăng xuất</a>
									</div>
								@endif
							</li>
					</ul>
					
					<form class="form-inline my-2 my-lg-0 mr-2">
						<div class="input-group search-area">
							<div class="input-group-prepend">
								<button class="btn">
									<i class="fas fa-search"></i>
								</button>
								<!-- <span class="input-group-text" id="inputGroupPrepend2">@</span> -->
							</div>
							<input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
						</div>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link cart-noti" title="Giỏ hàng" data-count="4" href="{{ asset("gio-hang") }}">
								<img class="" src="{{ asset('uploads/icons/cart-icon.png') }}" alt="">
							</a>
						</li>
						<li class="nav-item dropdown account-setting">
							<a href="#" class="nav-link" title="Tài khoản" id="navbarDropdown02" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="{{ asset('uploads/icons/setting-icon.png') }}" alt="">
							</a>
							<div class="dropdown-menu setting-dropdown" aria-labelledby="navbarDropdown">
								@if (Auth::guest())
									<a class="dropdown-item" href="{{ asset('login') }}">Đăng nhập</a>
									<a class="dropdown-item" href="{{ asset('logout') }}">Đăng kí</a>
								@else
									<a class="dropdown-item" href="{{ asset("tai-khoan") }}">Thông tin tài khoản</a>
									<a class="dropdown-item" href="{{ asset("don-hang") }}">Đơn hàng của tôi</a>
									<a class="dropdown-item" href="{{ asset('logout') }}">Đăng xuất</a>
								@endif
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Header Banner -->
	</header>