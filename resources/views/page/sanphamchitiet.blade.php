@extends('layouts.index')

@section('content')
<div class="container-fluid">

		<!-- Product Detail Info -->
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route("trangchu") }}">Trang chủ</a></li>
					<li>
						<span>›</span>
						<a href="{{ asset("san-pham") }}">Sản phẩm</a>
					</li>
					<li>
						<span>›</span>{{ $product->name }}
					</li>
				</ul>
			</div>

			<div class="row mt-2 prod-detail">
				<div class="col-sm-5 wrap-slick3">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="{{ asset("uploads/products/$product->thumbnail") }}">
							<div class="wrap-pic-w">
								<img class="img-fluid" src="{{ asset("uploads/products/$product->thumbnail") }}" width="100%" alt="IMG-PRODUCT">
							</div>
						</div>

						@foreach ($product->images as $item)
							<div class="item-slick3" data-thumb="{{ asset("uploads/products/$item->image") }}">
								<div class="wrap-pic-w">
									<img class="img-fluid" src="{{ asset("uploads/products/$item->image") }}" width="100%" alt="IMG-PRODUCT">
								</div>
							</div>
						@endforeach
						
					</div>
				</div>
				<div class="col-sm-7 prod-detail-info">
					<ul class="prod-detail-list">
						<li class="mt-2 mt-lg-0"><h4>{{ $product->name }}</h4></li>
						<li class="prod-price">Giá:
							<span>{{ number_format($product->price, 0, ',', '.') }} ₫</span>
							<span>249000đ</span>
							<span>-10%</span>
						</li>
						<li>Mã sản phẩm:<span class="prod-detail-id">{{ str_pad($product->id, 8, '0', STR_PAD_LEFT) }}</span></li>
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
				@foreach ($product->sets as $set_item)
					@foreach ($set_item->products as $item)
						@if ($item->id != $product->id)
							<div class="col-6 col-sm-4 col-md-3 col-lg-2-5 mb-30">
								<div class="prod-card"><a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}">
									<div class="prod-card-img">
										<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
									</div>
									<div class="prod-card-info">
										<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
										<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
									</div>
									<div class="tag-new">
										<img src="{{ asset("uploads/icons/New_Icon.png") }}" alt="icon">
									</div>
									<div class="tag-sale">
										<span class="card-sale">-40%</span>
									</div>
									<div class="card-add-to-cart">
										<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
									</div>
								</a></div>
							</div>
						@endif
					@endforeach
				@endforeach
			</div>
		</div>
		<!-- End Suggestion -->
	</div>
@endsection