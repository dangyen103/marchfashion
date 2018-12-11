@extends('layouts.index')

@section('content')
    <div class="container-fluid">

        <!-- Carousel -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('imgs/Banner01.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imgs/Banner02.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imgs/Banner03.jpg') }}" alt="Third slide">
                </div>
            </div>
        </div>
        <!-- End Carousel -->

		<div class="container-lf-3 px-15">
			<!-- New Products -->
			<div class="wrap-slick-carousel mt-5">
				<div class="row">
					<div class="col-12">
						<a href="#"><h3 class="home-title cl-black mb-3">Sản phẩm mới</h3></a>
					</div>
				</div>
				<div class="row slick-carousel1">
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="{{ asset('uploads/products/UEdaB-A10.jpg') }}" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="{{ asset('uploads/products/4hgpz-V03.jpg') }}" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="{{ asset('uploads/products/7HMmJ-P04.jpg') }}" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="{{ asset('uploads/products/GdVGd-Q04.jpg') }}" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="{{ asset('uploads/products/csgr9-A07.jpg') }}" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="{{ asset('uploads/products/7HMmJ-P04.jpg') }}" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="{{ asset('uploads/products/GdVGd-Q04.jpg') }}" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="{{ asset('uploads/products/csgr9-A07.jpg') }}" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
				</div>
			</div>
			<!-- End New Products -->

			<!-- Featured Products -->
			<div class="wrap-slick-carousel mt-5">
				<div class="row">
					<div class="col-12">
						<a href="#"><h3 class="home-title cl-black mb-3">Sản phẩm nổi bật</h3></a>
					</div>
				</div>
				<div class="row slick-carousel2">
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/UEdaB-A10.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/4hgpz-V03.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/7HMmJ-P04.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/GdVGd-Q04.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/csgr9-A07.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/7HMmJ-P04.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/GdVGd-Q04.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/csgr9-A07.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
				</div>
			</div>
			<!-- End Featured Products -->

			<!-- Suggested Products -->
			<div class="wrap-slick-carousel mt-5">
				<div class="row">
					<div class="col-12">
						<a href="#"><h3 class="home-title cl-black mb-3">Gợi ý cho bạn</h3></a>
					</div>
				</div>
				<div class="row slick-carousel3">
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/UEdaB-A10.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/4hgpz-V03.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/7HMmJ-P04.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/GdVGd-Q04.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/csgr9-A07.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/7HMmJ-P04.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/GdVGd-Q04.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
						<div class="prod-card"><a href="#">
							<div class="prod-card-img">
								<img class="img-fluid" src="uploads/products/csgr9-A07.jpg" width="100%" alt="hình ảnh">
							</div>
							<div class="prod-card-info">
								<div class="prod-card-id">A20493</div>
								<div class="prod-card-price">295000₫</div>
							</div>
							<div class="tag-new">
								<img src="uploads/icons/New_Icon.png" alt="icon">
							</div>
							<div class="tag-sale">
								<span class="card-sale">-40%</span>
							</div>
							<div class="card-add-to-cart">
								<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
							</div>
						</a></div>
					</div>
				</div>
			</div>
			<!-- End Suggested Products -->
		</div>

		<!-- Featured Posts -->
		<div class="my-5 pt-4 bg-dark-gray">
			<div class="container-lf-3 px-15">
				<div class="row">
					<div class="col-12">
						<a href="#"><h3 class="home-title-post mb-3">Xu hướng</h3></a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4">
						<div class="post-card">
							<div class="post-card-img">
								<img src="uploads/news/gQaBK-B23.jpg" alt="hình ảnh" width="100%">
							</div>
							<div class="post-card-info">
								<a href="#"><h4 class="post-card-title">Mách nàng mix đồ dạo phố cực trend mùa đông này</h4></a>
								<p class="post-card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit amet...</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 mb-4">
						<div class="post-card">
							<div class="post-card-img">
								<img src="uploads/news/gfaCb-photo-7-15269503150391483364789-edit.jpg" alt="hình ảnh" width="100%">
							</div>
							<div class="post-card-info">
								<a href="#"><h4 class="post-card-title">Mách nàng mix đồ dạo phố cực trend mùa đông này</h4></a>
								<p class="post-card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit amet...</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 mb-4">
						<div class="post-card">
							<div class="post-card-img">
								<img src="uploads/news/FcUqO-112.jpg" alt="hình ảnh" width="100%">
							</div>
							<div class="post-card-info">
								<a href="#"><h4 class="post-card-title">Mách nàng mix đồ dạo phố cực trend mùa đông này</h4></a>
								<p class="post-card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit amet...</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 mb-4">
						<div class="post-card">
							<div class="post-card-img">
								<img src="uploads/news/Numxo-photo-15-1526863728656470351668-edit.jpg" alt="hình ảnh" width="100%">
							</div>
							<div class="post-card-info">
								<a href="#"><h4 class="post-card-title">Mách nàng mix đồ dạo phố cực trend mùa đông này</h4></a>
								<p class="post-card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit amet...</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Featured Posts -->
	</div>
@endsection