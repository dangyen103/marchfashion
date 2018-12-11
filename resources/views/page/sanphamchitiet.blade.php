@extends('layouts.index')

@section('content')
<div class="container-fluid">

		<!-- Product Detail Info -->
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="#">Trang chủ</a></li>
					<li>
						<span>›</span>
						<a href="#">Sản phẩm</a>
					</li>
					<li>
						<span>›</span>Áo
					</li>
				</ul>
			</div>

			<div class="row mt-2 prod-detail">
				<div class="col-sm-5 wrap-slick3">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="uploads/products/3hCxQ-A09.jpg">
							<div class="wrap-pic-w">
								<img class="img-fluid" src="uploads/products/3hCxQ-A09.jpg" width="100%" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="uploads/products/3svuS-A05.jpg">
							<div class="wrap-pic-w">
								<img class="img-fluid" src="uploads/products/3svuS-A05.jpg" width="100%" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="uploads/products/DqMhb-A06.jpg">
							<div class="wrap-pic-w">
								<img class="img-fluid" src="uploads/products/DqMhb-A06.jpg" width="100%" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-7 prod-detail-info">
					<ul class="prod-detail-list">
						<li class="mt-2 mt-lg-0"><h4>Áo phông in hình cô gái</h4></li>
						<li class="prod-price">Giá:
							<span>189000₫</span>
							<span>249000đ</span>
							<span>-10%</span>
						</li>
						<li>Mã sản phẩm:<span class="prod-detail-id">A813744</span></li>
						<li>Tình trạng:<span>Còn hàng</span> </li>
					</ul>

					<form action="" class="prod-form">
							<div class="form-row mx-0 mb-1">
								<div class="form-group mr-4 mr-lg-5">
									<label for="inputColor">Màu sắc:</label>
									<select>
										<option selected>Trắng</option>
										<option>Đen</option>
									</select>

								</div>
								<div class="form-group">
									<label for="inputSize">Kích thước:</label>
									<select id="inputState">
										<option selected>S</option>
										<option>M</option>
										<option>L</option>
									</select>

								</div>
							</div>
							<div class="dp-flex form-group mb-4">
								<label class="mb-0" for="inputQuantity">Số lượng:</label>
								<div class="num-prod-group">
									<button class="btn-num-product-down">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>
									<input class="num-product" type="number" name="num-product" value="1">
									<button class="btn-num-product-up">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</div>

							<button class="btn btn-add-to-card mr-2">Thêm vào giỏ</i></button>
							<button type="submit" class="btn btn-buy-now">Mua ngay</i></button>
					</form>

					<div class="prod-detail-desct">
						<h6>Mô tả sản phẩm</h6>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit amet.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- End Product Detail Info -->

		<!-- Sugestion -->
		<div class="container-lf-3 px-15 mt-5 mb-3">
			<div class="row mb-2">
				<div class="col-12">
					<h3 class="txt-upc">Có thể mua cùng</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6 col-sm-4 col-md-3 col-lg-2-5 mb-30">
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
				<div class="col-6 col-sm-4 col-md-3 col-lg-2-5 mb-30">
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
				<div class="col-6 col-sm-4 col-md-3 col-lg-2-5 mb-30">
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
				<div class="col-6 col-sm-4 col-md-3 col-lg-2-5 mb-30">
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
			</div>
		</div>
		<!-- End Suggestion -->
	</div>
@endsection