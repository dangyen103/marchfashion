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
                @foreach ($web_home_banners as $key => $item)
					@if (!empty($item))
						@if ($key == 0)
							<div class="carousel-item active">
								<img class="d-block w-100" src="{{ asset("uploads/theme/$item") }}" alt="Home slide">
							</div>
						@else
							<div class="carousel-item">
								<img class="d-block w-100" src="{{ asset("uploads/theme/$item") }}" alt="Home slide">
							</div>
						@endif
					@endif
				@endforeach
            </div>
        </div>
        <!-- End Carousel -->

		<div class="container-lf-3 px-15">
			@if (empty($new_products) == 0)
				<!-- New Products -->
				<div class="wrap-slick-carousel mt-5">
					<div class="row">
						<div class="col-12">
							<a href="#"><h3 class="home-title cl-black mb-3">Sản phẩm mới</h3></a>
						</div>
					</div>
					<div class="row slick-carousel1">
						@foreach ($new_products as $item)
							<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
								<div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
									<div class="prod-card-img">
										<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
									</div>
									<div class="prod-card-info">
										<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
										<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
									</div>

									@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)))
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
						@endforeach
					</div>
				</div>
				<!-- End New Products -->
			@endif

			<!-- Featured Products -->
			<div class="wrap-slick-carousel mt-5">
				<div class="row">
					<div class="col-12">
						<a href="#"><h3 class="home-title cl-black mb-3">Sản phẩm nổi bật</h3></a>
					</div>
				</div>
				<div class="row slick-carousel2">
					@foreach ($feature_products as $item)
						<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
							<div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
								<div class="prod-card-img">
									<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
								</div>
								<div class="prod-card-info">
									<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
									<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
								</div>

								@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)))
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
					@endforeach
				</div>
			</div>
			<!-- End Featured Products -->

			
			@if (empty($suggested_products) == 0)
				<!-- Suggested Products -->
				<div class="wrap-slick-carousel mt-5">
					<div class="row">
						<div class="col-12">
							<a href="{{ asset("goi-y-cho-ban") }}"><h3 class="home-title cl-black mb-3">Gợi ý cho bạn</h3></a>
						</div>
					</div>
					<div class="row slick-carousel3">
						@foreach ($suggested_products as $item)
							<div class="col-6 col-sm-4 col-md-3 col-lg-2-5">
								<div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
									<div class="prod-card-img">
										<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
									</div>
									<div class="prod-card-info">
										<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
										<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
									</div>

									@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)))
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
						@endforeach
					</div>
				</div>
				<!-- End Suggested Products -->
			@endif
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
					@foreach ($posts as $item)
						<div class="col-md-6 col-lg-3 mb-4">
							<div class="post-card">
								<div class="post-card-img">
									<img src="{{ asset("uploads/posts/$item->image") }}" alt="hình ảnh" width="100%">
								</div>
								<div class="post-card-info">
									<a href="{{ asset("xu-huong/$item->id/$item->unsigned_title") }}"><h4 class="post-card-title">{{ $item->title }}</h4></a>
									<p class="post-card-description">{{ $item->description }}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- End Featured Posts -->
	</div>
@endsection