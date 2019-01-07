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

			<div class="row mt-2 prod-detail mb-4">
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
							@php
								$check = 0;
								foreach ($product->discounts as $prod_discount) {
									if (date('Y-m-d H:i:s', strtotime($prod_discount->start_time)) <= date('Y-m-d H:i:s')
									&& date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($prod_discount->finish_time))){
										$check = 1; 
										break;
									}
								}
								if ($check == 0) {
									echo '<span>'.number_format($product->price, 0, ',', '.').' ₫</span>';
								} else {
									echo '<span>'.number_format($product->price*(100 - $prod_discount->discountValue)/100, 0, ',', '.').' đ</span>';
									echo '<span>'.number_format($product->price, 0, ',', '.').' ₫</span>';
									echo '<span>-'.$prod_discount->discountValue.' %</span>';
								}
							@endphp
							
							{{-- @foreach ($product->discounts as $prod_discount)
								@if (date('Y-m-d H:i:s', strtotime($prod_discount->start_time)) <= date('Y-m-d H:i:s') 
									&& date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($prod_discount->finish_time)))
									<span>{{ number_format($product->price*(100 - $prod_discount->discountValue)/100, 0, ',', '.') }} đ</span>
									<span>{{ number_format($product->price, 0, ',', '.') }} ₫</span>
									<span>-{{ $prod_discount->discountValue }}%</span>
								@else
									<span>{{ number_format($product->price, 0, ',', '.') }} ₫</span>
								@endif
							@endforeach --}}
							
						</li>
						<li>Mã sản phẩm:<span class="prod-detail-id">{{ str_pad($product->id, 8, '0', STR_PAD_LEFT) }}</span></li>
						<li>Tình trạng:
							<span>
								@php
									$check = 0;
									foreach ($product->product_details as $item) {
										if($item->quantity > 0){
											echo 'Còn hàng';
											$check = 1;
											break;
										}
									}
									if ($check == 0) {
										echo 'Hết hàng';
									}
								@endphp
							</span>
						</li>
					</ul>

					<form action="" class="prod-form">
							<div class="form-row mx-0 mb-1">
								<div class="form-group mr-4 mr-lg-5">
									<label for="inputColor">Màu sắc:</label>
									<select name="color">
										@php
											$array = array();
											foreach ($product->product_details as $item){
												if (!in_array($item->color, $array)) {
													array_push($array, $item->color);
													echo "<option value=".'"'."$item->color".'"'.">"."$item->color"."</option>";
												}
											}
										@endphp
									</select>

								</div>
								<div class="form-group">
									<label for="inputSize">Kích thước:</label>
									<select id="inputState" name="size">
										@php
											$array = array();
											foreach ($product->product_details as $item){
												if (!in_array($item->size, $array)) {
													array_push($array, $item->size);
													echo "<option value=".'"'."$item->size".'"'.">"."$item->size"."</option>";
												}
											}
										@endphp
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

		@if (empty(json_decode($product->sets)) == 0)
			<!-- Buy Together-->
			<div class="container-lf-3 px-15" style="margin-top: 2rem">
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
									<div class="prod-card"><a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
										<div class="prod-card-img">
											<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
										</div>
										<div class="prod-card-info">
											<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
											<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
										</div>

										@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)) &&
											date('Y-m-d', strtotime($item->created_at)) <= strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " +1 week")))
											<div class="tag-new">
												<img src="{{ asset("uploads/icons/New_Icon.png") }}" alt="icon">
											</div>	
										@endif

										@foreach ($item->discounts as $item_discount)
											@if (date('Y-m-d H:i:s', strtotime($item_discount->start_time)) <= date('Y-m-d H:i:s') 
												&& date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($item_discount->finish_time)))
												<div class="tag-sale">
													<span class="card-sale">-{{ $item_discount->discountValue  }}%</span>
												</div>
											@endif
										@endforeach

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
			<!-- End Buy Together -->
		@endif
		
	</div>
@endsection